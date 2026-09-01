<?php
class DeliveryModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "ecommerce_db");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

   
    public function getAssignedOrders($deliveryBoyId) {
        $sql = "SELECT orders.id, orders.total_price, orders.address, orders.status, orders.created_at,
                       products.product_name, 
                       CONCAT(users.first_name, ' ', users.last_name) AS customer_name
                FROM orders
                JOIN products ON orders.product_id = products.id
                JOIN users ON orders.buyer_id = users.id
                WHERE orders.delivery_id = ? AND orders.status = 'Assigned'
                ORDER BY orders.id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $deliveryBoyId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

 
    public function getDeliveredOrders($deliveryBoyId) {
        $sql = "SELECT orders.id, orders.total_price, orders.address, orders.status, orders.created_at,
                       products.product_name, 
                       CONCAT(users.first_name, ' ', users.last_name) AS customer_name
                FROM orders
                JOIN products ON orders.product_id = products.id
                JOIN users ON orders.buyer_id = users.id
                WHERE orders.delivery_id = ? AND orders.status = 'mark delivered'
                ORDER BY orders.id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $deliveryBoyId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

  
    public function updateOrderStatusToDelivered($orderId) {
        $sql = "UPDATE orders SET status = 'mark delivered' WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        return $stmt->execute();
    }
}
?>
