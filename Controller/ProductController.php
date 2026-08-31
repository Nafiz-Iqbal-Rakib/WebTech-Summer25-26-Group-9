<?php

require_once __DIR__ . "/../Model/AdminModel.php";

class ProductController
{
    protected $model;


    public function __construct()
    {
        $this->model = new AdminModel();
    }


    // =========================
    // GET ALL PRODUCTS
    // =========================

    public function getProducts()
    {
        $result = $this->model->getAllProducts();

        $products = [];


        while ($row = $result->fetch_assoc()) {


            // Product Status

            if ($row["stock"] == 0) {

                $status = "OUT OF STOCK";
                $statusClass = "badge-out-of-stock";

            } elseif ($row["stock"] <= 3) {

                $status = "LOW STOCK";
                $statusClass = "badge-low-stock";

            } else {

                $status = "ACTIVE";
                $statusClass = "badge-active";
            }


            // Product Data

            $products[] = [

                "id" =>
                    $row["id"],

                "name" =>
                    $row["produce_name"],

                "seller" =>
                    $row["first_name"] . " " .
                    $row["last_name"],

                "price" =>
                    $row["price"],

                "stock" =>
                    $row["stock"],

                "status" =>
                    $status,

                "statusClass" =>
                    $statusClass
            ];
        }


        return $products;
    }


    // =========================
    // DELETE PRODUCT
    // =========================

    public function deleteProduct($id)
    {
        return $this->model->deleteProduct($id);
    }
}


/* =========================
   DELETE REQUEST
========================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = json_decode(
        file_get_contents("php://input"),
        true
    );


    if (
        isset($data["action"]) &&
        $data["action"] === "delete" &&
        isset($data["id"])
    ) {

        $controller = new ProductController();


        $success = $controller->deleteProduct(
            $data["id"]
        );


        header("Content-Type: application/json");


        echo json_encode([
            "success" => $success
        ]);


        exit;
    }
}

?>