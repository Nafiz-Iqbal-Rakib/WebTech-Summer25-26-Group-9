<?php

class BuyerModel
{
    function getProductById($productId)
    {
        $database = new Database();
        $connection = $database->connection();

        $sql = "SELECT * FROM products WHERE id = '".$productId."'";

        $result = $connection->query($sql);

        return $result;
    }


    function getSellerById($sellerId)
    {
        $database = new Database();
        $connection = $database->connection();

        $sql = "SELECT * FROM users WHERE id = '".$sellerId."'";

        $result = $connection->query($sql);

        return $result;
    }


    function addOrder(
        $buyerId,
        $productId,
        $sellerId,
        $quantity,
        $totalPrice,
        $address
    )
    {
        $database = new Database();
        $connection = $database->connection();

        $status = "PENDING";

        $sql = "INSERT INTO orders
                (buyer_id, product_id, seller_id, quantity, total_price, address, status)
                VALUES
                ('".$buyerId."',
                 '".$productId."',
                 '".$sellerId."',
                 '".$quantity."',
                 '".$totalPrice."',
                 '".$address."',
                 '".$status."')";

        $result = $connection->query($sql);

        return $result;
    }


    function getBuyerOrders($buyerId)
    {
        $database = new Database();
        $connection = $database->connection();

        $sql = "SELECT id, address, status
                FROM orders
                WHERE buyer_id = '".$buyerId."'
                ORDER BY id DESC";

        $result = $connection->query($sql);

        return $result;
    }
}

?>
