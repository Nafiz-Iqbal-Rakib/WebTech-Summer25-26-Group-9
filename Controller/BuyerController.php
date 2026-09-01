<?php

require_once __DIR__ . "/../Model/BuyerModel.php";

class BuyerController
{
    protected $model;


    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->model = new BuyerModel();
    }


    public function checkBuyerSession()
    {
        if (
            !isset($_SESSION["user_id"]) ||
            !isset($_SESSION["role"]) ||
            $_SESSION["role"] !== "buyer"
        ) {
            header(
                "Location: /WebTech-Summer25-26-Group-9/View/Common/Pages/loginPage.php"
            );

            exit;
        }
    }


    public function getProduct($productId)
    {
        $result = $this->model->getProductById(
            (int)$productId
        );


        if (
            !$result ||
            $result->num_rows === 0
        ) {
            return null;
        }


        return $result->fetch_assoc();
    }


    public function placeOrder()
    {
        /*
        Only check login when Buyer clicks
        CHECKOUT NOW
        */

        $this->checkBuyerSession();


        $productId = (int)(
            $_POST["product_id"] ?? 0
        );


        $quantity = (int)(
            $_POST["quantity"] ?? 0
        );


        $country = trim(
            $_POST["country"] ?? ""
        );


        $city = trim(
            $_POST["city"] ?? ""
        );


        $zip = trim(
            $_POST["zip"] ?? ""
        );


        if ($productId <= 0) {

            return [
                "success" => false,
                "message" => "Product is required."
            ];
        }


        if ($quantity < 1) {

            return [
                "success" => false,
                "message" => "Quantity must be at least 1."
            ];
        }


        if (
            $country === "" ||
            $city === "" ||
            $zip === ""
        ) {

            return [
                "success" => false,
                "message" => "Shipping address is required."
            ];
        }


        $product = $this->getProduct(
            $productId
        );


        if (!$product) {

            return [
                "success" => false,
                "message" => "Product not found."
            ];
        }


        if (
            $quantity >
            (int)$product["stock"]
        ) {

            return [
                "success" => false,
                "message" => "Not enough stock."
            ];
        }


        $shipping = 100;


        $subtotal =
            $product["price"] *
            $quantity;


        $total =
            $subtotal +
            $shipping;


        $address =
            $country .
            ", " .
            $city .
            " - " .
            $zip;


        $success = $this->model->addOrder(

            (int)$_SESSION["user_id"],

            $productId,

            (int)$product["seller_id"],

            $quantity,

            $total,

            $address

        );


        if (!$success) {

            return [
                "success" => false,
                "message" => "Order could not be placed."
            ];
        }


        $_SESSION["last_order_status"] =
            "PENDING";


        setcookie(
            "buyer_city",
            $city,
            time() + (86400 * 30),
            "/"
        );


        $jsonFile =
            __DIR__ .
            "/../Model/buyer_orders.json";


        $orders = [];


        if (file_exists($jsonFile)) {

            $jsonData =
                file_get_contents(
                    $jsonFile
                );


            $orders =
                json_decode(
                    $jsonData,
                    true
                );


            if (!is_array($orders)) {

                $orders = [];

            }
        }


        $orders[] = [

            "buyer_id" =>
                (int)$_SESSION["user_id"],

            "product_id" =>
                $productId,

            "location" =>
                $address,

            "status" =>
                "PENDING"

        ];


        file_put_contents(

            $jsonFile,

            json_encode(
                $orders,
                JSON_PRETTY_PRINT
            )

        );


        return [
            "success" => true,
            "message" => "Order placed successfully."
        ];
    }


    public function getOrders()
    {
        /*
        My Orders should still require login.
        */

        $this->checkBuyerSession();


        return $this->model->getBuyerOrders(
            (int)$_SESSION["user_id"]
        );
    }
}

?>