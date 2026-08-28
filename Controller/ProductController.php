<?php

class ProductController
{
    public function getProducts()
    {
        $products = [

            [
                "id" => 1,
                "name" => "Oslo Lounge Chair",
                "seller" => "Hasan Furniture",
                "price" => "$500",
                "stock" => 8,
                "status" => "ACTIVE",
                "statusClass" => "badge-active"
            ],

            [
                "id" => 2,
                "name" => "Linen Throw Pillow Set",
                "seller" => "Urban Home",
                "price" => "$800",
                "stock" => 3,
                "status" => "LOW STOCK",
                "statusClass" => "badge-low-stock"
            ],

            [
                "id" => 3,
                "name" => "Marble Side Table",
                "seller" => "Elegant Living",
                "price" => "$8,900",
                "stock" => 12,
                "status" => "ACTIVE",
                "statusClass" => "badge-active"
            ],

            [
                "id" => 4,
                "name" => "Arabi Scented Candle",
                "seller" => "Aroma Living",
                "price" => "$650",
                "stock" => 0,
                "status" => "OUT OF STOCK",
                "statusClass" => "badge-out-of-stock"
            ],

            [
                "id" => 5,
                "name" => "Rattan Pendant Light",
                "seller" => "Light House BD",
                "price" => "$400",
                "stock" => 6,
                "status" => "ACTIVE",
                "statusClass" => "badge-active"
            ],

            [
                "id" => 6,
                "name" => "Jute Storage Basket",
                "seller" => "Natural Craft",
                "price" => "$900",
                "stock" => 25,
                "status" => "ACTIVE",
                "statusClass" => "badge-active"
            ],

            [
                "id" => 7,
                "name" => "Minimalist Wall Clock",
                "seller" => "Modern Decor",
                "price" => "$200",
                "stock" => 2,
                "status" => "LOW STOCK",
                "statusClass" => "badge-low-stock"
            ],

            [
                "id" => 8,
                "name" => "Cedar Bookshelf",
                "seller" => "Wood Works BD",
                "price" => "$6,000",
                "stock" => 4,
                "status" => "ACTIVE",
                "statusClass" => "badge-active"
            ]

        ];

        return $products;
    }
}