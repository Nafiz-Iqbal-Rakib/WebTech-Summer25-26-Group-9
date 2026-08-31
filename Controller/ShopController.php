<?php

class ShopController
{
    public function getProducts()
    {
        // Dummy product data
        $products = [
             [
                'id' => 1,
                'name' => 'Green Winter Jacket',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (6).png',
                'price' => 124,
                'rating' => 4
            ],

            [
                'id' => 2,
                'name' => 'Black Casual T-Shirt',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (7).png',
                'price' => 45,
                'rating' => 4
            ],

            [
                'id' => 3,
                'name' => 'Blue Denim Jacket',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (8).png',
                'price' => 95,
                'rating' => 5
            ],

            [
                'id' => 1,
                'name' => 'Green Winter Jacket',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (6).png',
                'price' => 124,
                'rating' => 4
            ],

            [
                'id' => 2,
                'name' => 'Black Casual T-Shirt',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (7).png',
                'price' => 45,
                'rating' => 4
            ],

            [
                'id' => 3,
                'name' => 'Blue Denim Jacket',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (8).png',
                'price' => 95,
                'rating' => 5
            ],

            [
                'id' => 4,
                'name' => 'White Sneakers',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (9).png',
                'price' => 89,
                'rating' => 4
            ],

            [
                'id' => 5,
                'name' => 'Brown Leather Bag',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (10).png',
                'price' => 110,
                'rating' => 4
            ],

            [
                'id' => 6,
                'name' => 'Grey Hoodie',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (12).png',
                'price' => 68,
                'rating' => 4
            ],

            [
                'id' => 7,
                'name' => 'Red Polo Shirt',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (3).png',
                'price' => 52,
                'rating' => 3
            ],

            [
                'id' => 8,
                'name' => 'Beige Chinos',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (11).png',
                'price' => 72,
                'rating' => 4
            ],

            [
                'id' => 9,
                'name' => 'Black Backpack',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (13).png',
                'price' => 85,
                'rating' => 5
            ],

            [
                'id' => 10,
                'name' => 'Blue Cotton Shirt',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (14).png',
                'price' => 59,
                'rating' => 4
            ],

            [
                'id' => 11,
                'name' => 'Black Formal Shoes',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (15).png',
                'price' => 105,
                'rating' => 4
            ],

            [
                'id' => 12,
                'name' => 'Cream Knit Sweater',
                'image' => '\WebTech-Summer25-26-Group-9\Uploaded File\Image (16).png',
                'price' => 78,
                'rating' => 5
            ]
        ];

        return $products;
    }
}