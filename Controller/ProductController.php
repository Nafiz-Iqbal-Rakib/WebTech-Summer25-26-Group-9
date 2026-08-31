<?php

require_once __DIR__ . "/../Model/AdminModel.php";

class ProductController
{
    protected $model;

    public function __construct()
    {
        $this->model = new AdminModel();
    }

    public function getProducts()
    {
        $result = $this->model->getAllProducts();

        $products = [];

        while ($row = $result->fetch_assoc()) {

            
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


            $products[] = [

                "id" => $row["id"],

                "name" => $row["produce_name"],

                "seller" => $row["first_name"] . " " . $row["last_name"],

                "price" => "$" . $row["price"],

                "stock" => $row["stock"],

                "status" => $status,

                "statusClass" => $statusClass

            ];
        }

        return $products;
    }
}

?>