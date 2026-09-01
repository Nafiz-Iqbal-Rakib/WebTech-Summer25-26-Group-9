<?php
class DeliveryModel {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "your_database_name");
    }

    public function getAssignedDeliveries() {
        $query = "SELECT * FROM orders WHERE status = 'Assigned'";
        return mysqli_query($this->conn, $query);
    }

    public function getDeliveredDeliveries() {
        $query = "SELECT * FROM orders WHERE status = 'Delivered'";
        return mysqli_query($this->conn, $query);
    }

    public function updateOrderStatus($order_id) {
        $query = "UPDATE orders SET status = 'Delivered' WHERE id = '$order_id'";
        return mysqli_query($this->conn, $query);
    }
}
?>