<?php
require_once __DIR__ . '/../Model/DeliveryModel.php';

class DeliveryController {
    private $model;

    public function __construct() {
        $this->model = new DeliveryModel();
    }

    public function getAssignedDeliveries() {
        return $this->model->getAssignedOrders(1);
    }

    public function getDeliveredHistory() {
        return $this->model->getDeliveredOrders(1);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'mark_delivered') {
    $orderId = $_POST['order_id'];
    $model = new DeliveryModel();
    $updated = $model->updateOrderStatusToDelivered($orderId);

    if ($updated) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit;
}
?>
