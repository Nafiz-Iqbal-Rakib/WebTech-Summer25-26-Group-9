<?php
require_once '../Model/DeliveryModel.php';

class DeliveryController {
    private $model;

    public function __construct() {
        $this->model = new DeliveryModel();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'mark_delivered') {
            $order_id = $_POST['order_id'];
            $this->model->updateOrderStatus($order_id);
            header("Location: ../View/my_deliveries.php");
            exit();
        }
    }

    public function getAssignedOrders() {
        return $this->model->getAssignedDeliveries();
    }

    public function getDeliveredOrders() {
        return $this->model->getDeliveredDeliveries();
    }
}

$controller = new DeliveryController();
$controller->handleRequest();
?>