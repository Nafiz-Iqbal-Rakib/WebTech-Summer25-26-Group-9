<?php

require_once __DIR__ . "/../Model/AdminModel.php";

class ShopController
{
    protected $model;


    public function __construct()
    {
        $this->model = new AdminModel();
    }


    public function getProducts()
    {
        $result = $this->model->getAllProductsShop();

        $products = [];


        while ($row = $result->fetch_assoc()) {

            $products[] = [

                "id" =>
                    $row["id"],

                "name" =>
                    $row["product_name"],

                "image" =>
                    "/WebTech-Summer25-26-Group-9/Uploads/products/" .
                    $row["img"],

                "price" =>
                    $row["price"],

                "rating" =>
                    4,

                "sellerId" =>
                    $row["seller_id"],

                "seller" =>
                    $row["seller_first_name"] . " " .
                    $row["seller_last_name"],

                "stock" =>
                    $row["stock"]
            ];
        }


        return $products;
    }
}

?>