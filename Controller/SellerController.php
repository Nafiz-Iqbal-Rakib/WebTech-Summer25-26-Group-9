<?php

require_once __DIR__ . "/../Model/SellerModel.php";


class SellerController
{
    protected $sellerModel;


    public function __construct()
    {
        $this->sellerModel = new SellerModel();
    }


    // =====================================================
    // GET SELLER PRODUCTS
    // =====================================================

    public function getSellerProductData($sellerId = null)
    {
        if (!$sellerId) {
            return [
                "products" => [],
                "totalProducts" => 0,
                "activeCount" => 0,
                "lowOrOutStock" => 0
            ];
        }


        $result =
            $this->sellerModel->getSellerProducts(
                $sellerId
            );


        if ($result === false) {
            return [
                "products" => [],
                "totalProducts" => 0,
                "activeCount" => 0,
                "lowOrOutStock" => 0
            ];
        }


        $products = [];

        $totalProducts = 0;
        $activeCount = 0;
        $lowOrOutStock = 0;


        foreach ($result as $row) {

            $stock =
                (int)$row["stock"];


            if ($stock === 0) {

                $status = "OUT OF STOCK";
                $statusClass = "out-status";

                $lowOrOutStock++;

            } elseif ($stock < 5) {

                $status = "LOW STOCK";
                $statusClass = "low-status";

                $lowOrOutStock++;

            } else {

                $status = "ACTIVE";
                $statusClass = "active-status";

                $activeCount++;
            }


            $totalProducts++;


            $products[] = [

                "id" =>
                    $row["id"],

                "name" =>
                    $row["product_name"],

                "description" =>
                    $row["description"] ?? "",

                "category" =>
                    "General",

                "price" =>
                    $row["price"],

                "stock" =>
                    $row["stock"],

                "img" =>
                    $row["img"],

                "status" =>
                    $status,

                "statusClass" =>
                    $statusClass
            ];
        }


        return [
            "products" => $products,
            "totalProducts" => $totalProducts,
            "activeCount" => $activeCount,
            "lowOrOutStock" => $lowOrOutStock
        ];
    }


    // =====================================================
    // ADD SELLER PRODUCT
    // =====================================================

    public function addSellerProduct(
        $sellerId,
        $productName,
        $description,
        $price,
        $stock,
        $image = null
    ) {
        return $this->sellerModel->addSellerProduct(
            $sellerId,
            $productName,
            $description,
            $price,
            $stock,
            $image
        );
    }


    // =====================================================
    // UPDATE SELLER PRODUCT
    // =====================================================

    public function updateSellerProduct(
        $sellerId,
        $productId,
        $productName,
        $description,
        $price,
        $stock
    ) {
        return $this->sellerModel->updateSellerProduct(
            $sellerId,
            $productId,
            $productName,
            $description,
            $price,
            $stock
        );
    }


    // =====================================================
    // DELETE SELLER PRODUCT
    // =====================================================

    public function deleteSellerProduct(
        $sellerId,
        $productId
    ) {
        return $this->sellerModel->deleteSellerProduct(
            $sellerId,
            $productId
        );
    }


    // =====================================================
    // GET SELLER ORDERS
    // =====================================================

    public function getSellerOrderData($sellerId = null)
    {
        if (!$sellerId) {
            return [
                "orders" => [],
                "totalOrders" => 0,
                "pendingCount" => 0,
                "shippedCount" => 0,
                "deliveredCount" => 0
            ];
        }


        $result =
            $this->sellerModel->getSellerOrders(
                $sellerId
            );


        if ($result === false) {
            return [
                "orders" => [],
                "totalOrders" => 0,
                "pendingCount" => 0,
                "shippedCount" => 0,
                "deliveredCount" => 0
            ];
        }


        $orders = [];

        $totalOrders = 0;
        $pendingCount = 0;
        $shippedCount = 0;
        $deliveredCount = 0;


        foreach ($result as $row) {

            $status =
                strtoupper(
                    trim(
                        $row["status"] ?? ""
                    )
                );


            if ($status === "") {

                $status = "PENDING";
            }


            if ($status === "PENDING") {

                $pendingCount++;

            } elseif (
                $status === "SHIPPED" ||
                $status === "PROCESSING"
            ) {

                $shippedCount++;

            } elseif (
                $status === "DELIVERED" ||
                $status === "COMPLETED"
            ) {

                $deliveredCount++;
            }


            $totalOrders++;


            $orders[] = [

                "id" =>
                    "#ORD-" .
                    str_pad(
                        $row["id"],
                        3,
                        "0",
                        STR_PAD_LEFT
                    ),

                "customer" =>
                    trim(
                        $row["buyer_first_name"] .
                        " " .
                        $row["buyer_last_name"]
                    ),

                "product" =>
                    $row["product_name"],

                "qty" =>
                    1,

                "amount" =>
                    $row["total_price"],

                "date" =>
                    date(
                        "M d, Y",
                        strtotime(
                            $row["created_at"]
                        )
                    ),

                "status" =>
                    $status
            ];
        }


        return [

            "orders" =>
                $orders,

            "totalOrders" =>
                $totalOrders,

            "pendingCount" =>
                $pendingCount,

            "shippedCount" =>
                $shippedCount,

            "deliveredCount" =>
                $deliveredCount
        ];
    }
}


// =========================================================
// AJAX REQUESTS
// =========================================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    header(
        "Content-Type: application/json; charset=UTF-8"
    );


    $sellerId =
        $_SESSION["user_id"] ?? null;


    if (!$sellerId) {

        echo json_encode([
            "success" => false,
            "message" => "Seller is not logged in."
        ]);

        exit;
    }


    $controller =
        new SellerController();


    $action =
        $_GET["action"] ?? "";


    // =====================================================
    // ADD PRODUCT
    // =====================================================

    if ($action === "add") {

        $productName =
            trim(
                $_POST["product_name"] ?? ""
            );


        $description =
            trim(
                $_POST["description"] ?? ""
            );


        $price =
            $_POST["price"] ?? "";


        $stock =
            $_POST["stock"] ?? "";


        if (
            $productName === "" ||
            $description === "" ||
            $price === "" ||
            $stock === ""
        ) {

            echo json_encode([
                "success" => false,
                "message" =>
                    "Please fill in all required fields."
            ]);

            exit;
        }


        if (
            !is_numeric($price) ||
            !is_numeric($stock) ||
            $price < 0 ||
            $stock < 0
        ) {

            echo json_encode([
                "success" => false,
                "message" =>
                    "Invalid price or stock."
            ]);

            exit;
        }


        $image = null;


        if (
            isset($_FILES["product_image"]) &&
            $_FILES["product_image"]["error"] !==
            UPLOAD_ERR_NO_FILE
        ) {

            if (
                $_FILES["product_image"]["error"] !==
                UPLOAD_ERR_OK
            ) {

                echo json_encode([
                    "success" => false,
                    "message" =>
                        "Image upload failed."
                ]);

                exit;
            }


            $image =
                $_FILES["product_image"];
        }


        $success =
            $controller->addSellerProduct(
                (int)$sellerId,
                $productName,
                $description,
                (float)$price,
                (int)$stock,
                $image
            );


        echo json_encode([

            "success" =>
                (bool)$success,

            "message" =>
                $success
                    ? "Product added successfully."
                    : "Failed to add product."
        ]);

        exit;
    }


    // =====================================================
    // UPDATE PRODUCT
    // =====================================================

    if ($action === "update") {

        $productId =
            $_POST["id"] ?? null;


        $productName =
            trim(
                $_POST["product_name"] ?? ""
            );


        $description =
            trim(
                $_POST["description"] ?? ""
            );


        $price =
            $_POST["price"] ?? "";


        $stock =
            $_POST["stock"] ?? "";


        if (
            !$productId ||
            $productName === "" ||
            $description === "" ||
            $price === "" ||
            $stock === ""
        ) {

            echo json_encode([
                "success" => false,
                "message" =>
                    "Invalid product data."
            ]);

            exit;
        }


        if (
            !is_numeric($price) ||
            !is_numeric($stock) ||
            $price < 0 ||
            $stock < 0
        ) {

            echo json_encode([
                "success" => false,
                "message" =>
                    "Invalid price or stock."
            ]);

            exit;
        }


        $success =
            $controller->updateSellerProduct(
                (int)$sellerId,
                (int)$productId,
                $productName,
                $description,
                (float)$price,
                (int)$stock
            );


        echo json_encode([

            "success" =>
                (bool)$success,

            "message" =>
                $success
                    ? "Product updated successfully."
                    : "Failed to update product."
        ]);

        exit;
    }


    // =====================================================
    // DELETE PRODUCT
    // =====================================================

    if ($action === "delete") {

        $productId =
            $_POST["id"] ?? null;


        if (!$productId) {

            echo json_encode([
                "success" => false,
                "message" =>
                    "Product ID is required."
            ]);

            exit;
        }


        $success =
            $controller->deleteSellerProduct(
                (int)$sellerId,
                (int)$productId
            );


        echo json_encode([

            "success" =>
                (bool)$success,

            "message" =>
                $success
                    ? "Product deleted successfully."
                    : "Failed to delete product."
        ]);

        exit;
    }


    echo json_encode([
        "success" => false,
        "message" => "Invalid action."
    ]);

    exit;
}

?>