<?php

require_once __DIR__ . "/Database.php";

class BuyerModel
{
    protected $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection();
    }

    public function getProductById($productId)
    {
        $sql = "SELECT
                    products.id,
                    products.seller_id,
                    products.product_name,
                    products.description,
                    products.price,
                    products.stock,
                    products.img,
                    users.first_name AS seller_first_name,
                    users.last_name AS seller_last_name
                FROM products
                INNER JOIN users
                    ON products.seller_id = users.id
                WHERE products.id = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function addOrder(
        $buyerId,
        $productId,
        $sellerId,
        $quantity,
        $totalPrice,
        $address
    ) {
        $status = "PENDING";

        $sql = "INSERT INTO orders
                (buyer_id, product_id, seller_id, quantity, total_price, address, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param(
            "iiiidss",
            $buyerId,
            $productId,
            $sellerId,
            $quantity,
            $totalPrice,
            $address,
            $status
        );

        return $stmt->execute();
    }

    public function getBuyerOrders($buyerId)
    {
        $sql = "SELECT id, address, status
                FROM orders
                WHERE buyer_id = ?
                ORDER BY id DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $buyerId);
        $stmt->execute();

        return $stmt->get_result();
    }
}

?>
