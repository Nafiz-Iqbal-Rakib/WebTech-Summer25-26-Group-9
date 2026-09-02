<?php

include "../../../Model/Database.php";
include "../../../Model/BuyerModel.php";

session_start();


class BuyerController
{
    function checkBuyerSession()
    {
        if(
            !isset($_SESSION["user_id"]) ||
            !isset($_SESSION["role"]) ||
            $_SESSION["role"] != "buyer"
        )
        {
            Header("Location:../../Common/Pages/loginPage.php");
            die();
        }
    }


    function getProduct($productId)
    {
        $model = new BuyerModel();

        $result = $model->getProductById($productId);

        if(!$result || $result->num_rows == 0)
        {
            return null;
        }

        $product = $result->fetch_assoc();


        $sellerResult = $model->getSellerById(
            $product["seller_id"]
        );


        if(
            $sellerResult &&
            $sellerResult->num_rows > 0
        )
        {
            $seller =
                $sellerResult->fetch_assoc();


            $product["seller_first_name"] =
                $seller["first_name"];

            $product["seller_last_name"] =
                $seller["last_name"];
        }
        else
        {
            $product["seller_first_name"] = "";
            $product["seller_last_name"] = "";
        }


        return $product;
    }


    function placeOrder()
    {
        $this->checkBuyerSession();


        $productId =
            trim(
                $_POST["product_id"] ?? ""
            );


        $quantity =
            trim(
                $_POST["quantity"] ?? ""
            );


        $country =
            trim(
                $_POST["country"] ?? ""
            );


        $city =
            trim(
                $_POST["city"] ?? ""
            );


        $zip =
            trim(
                $_POST["zip"] ?? ""
            );


        $valid = true;
        $message = "";


        /*
        =========================
        Validation
        =========================
        */


        if(empty($productId))
        {
            $message .=
                "Product is required. ";

            $valid = false;
        }


        if(
            empty($quantity) ||
            $quantity < 1
        )
        {
            $message .=
                "Quantity must be at least 1. ";

            $valid = false;
        }


        if(
            empty($country) ||
            empty($city) ||
            empty($zip)
        )
        {
            $message .=
                "Shipping address is required.";

            $valid = false;
        }


        if(!$valid)
        {
            return [
                "success" => false,
                "message" => $message
            ];
        }


        /*
        =========================
        Get Product
        =========================
        */


        $product =
            $this->getProduct(
                $productId
            );


        if(!$product)
        {
            return [
                "success" => false,
                "message" => "Product not found."
            ];
        }


        /*
        =========================
        Stock Check
        =========================
        */


        if(
            $quantity >
            $product["stock"]
        )
        {
            return [
                "success" => false,
                "message" => "Not enough stock."
            ];
        }


        /*
        =========================
        Calculate Total
        =========================
        */


        $shipping = 100;


        $subtotal =
            $product["price"] *
            $quantity;


        $total =
            $subtotal +
            $shipping;


        /*
        =========================
        Create Address
        =========================
        */


        $address =
            $country .
            ", " .
            $city .
            " - " .
            $zip;


        /*
        =========================
        Add Order
        =========================
        */


        $model =
            new BuyerModel();


        $result =
            $model->addOrder(
                $_SESSION["user_id"],
                $productId,
                $product["seller_id"],
                $total,
                $address
            );


        if(!$result)
        {
            return [
                "success" => false,
                "message" =>
                    "Order could not be placed."
            ];
        }


        /*
        =========================
        Order Status
        =========================
        */


        $_SESSION["last_order_status"] =
            "PENDING";


        /*
        =========================
        Save City Cookie
        =========================
        */


        setcookie(
            "buyer_city",
            $city,
            time() + 60 * 60 * 24 * 30,
            "/"
        );


        /*
        =========================
        Save Order JSON
        =========================
        */


        $jsonfile =
            "../../../Model/buyer_orders.json";


        $orders = [];


        if(file_exists($jsonfile))
        {
            $jsonData =
                file_get_contents(
                    $jsonfile
                );


            $orders =
                json_decode(
                    $jsonData,
                    true
                ) ?? [];
        }


        $orders[] = [

            "buyer_id" =>
                $_SESSION["user_id"],

            "product_id" =>
                $productId,

            "location" =>
                $address,

            "status" =>
                "PENDING"
        ];


        file_put_contents(
            $jsonfile,
            json_encode(
                $orders,
                JSON_PRETTY_PRINT
            )
        );


        /*
        =========================
        Success
        =========================
        */


        return [
            "success" => true,
            "message" =>
                "Order placed successfully."
        ];
    }


    function getOrders()
    {
        $this->checkBuyerSession();


        $model =
            new BuyerModel();


        $result =
            $model->getBuyerOrders(
                $_SESSION["user_id"]
            );


        return $result;
    }
}

?>