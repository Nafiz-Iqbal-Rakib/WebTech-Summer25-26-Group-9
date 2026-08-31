<?php

require_once __DIR__ . "/../Model/AdminModel.php";
require_once __DIR__ . "/../Model/CommonModel.php";

class SellerController
{
    protected $adminModel;
    protected $commonModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->commonModel = new CommonModel();
    }

    public function getSellerProductData($sellerId = null)
    {
        $result = $this->adminModel->getAllProductsShop();

        $products = [];
        $totalProducts = 0;
        $activeCount = 0;
        $lowOrOutStock = 0;

        while ($row = $result->fetch_assoc()) {
            if ($sellerId !== null && (int)$row["seller_id"] !== (int)$sellerId) {
                continue;
            }

            $stock = (int)$row["stock"];
            $status = "ACTIVE";
            $statusClass = "active-status";

            if ($stock === 0) {
                $status = "OUT OF STOCK";
                $statusClass = "out-status";
                $lowOrOutStock++;
            } elseif ($stock < 5) {
                $status = "LOW STOCK";
                $statusClass = "low-status";
                $lowOrOutStock++;
            } else {
                $activeCount++;
            }

            $totalProducts++;

            $products[] = [
                "id" => $row["id"],
                "name" => $row["produce_name"],
                "description" => $row["produce_name"] . " - High quality item",
                "category" => "General",
                "price" => $row["price"],
                "stock" => $row["stock"],
                "status" => $status,
                "statusClass" => $statusClass
            ];
        }

        return [
            "products" => $products,
            "totalProducts" => $totalProducts,
            "activeCount" => $activeCount,
            "lowOrOutStock" => $lowOrOutStock
        ];
    }

    public function getSellerOrderData($sellerId = null)
    {
        $result = $this->adminModel->getAllOrders();

        $orders = [];
        $totalOrders = 0;
        $pendingCount = 0;
        $shippedCount = 0;
        $deliveredCount = 0;

        while ($row = $result->fetch_assoc()) {
            $status = strtoupper($row["status"]);
            if ($status === "" || $status === "PENDING") {
                $status = "PENDING";
                $pendingCount++;
            } elseif ($status === "SHIPPED" || $status === "PROCESSING") {
                $shippedCount++;
            } elseif ($status === "DELIVERED" || $status === "COMPLETED") {
                $deliveredCount++;
            }

            $totalOrders++;

            $orders[] = [
                "id" => "#ORD-" . str_pad($row["id"], 3, "0", STR_PAD_LEFT),
                "customer" => $row["buyer_first_name"] . " " . $row["buyer_last_name"],
                "product" => $row["produce_name"],
                "qty" => 1,
                "amount" => $row["total_price"],
                "date" => date("M d, Y", strtotime($row["created_at"])),
                "status" => $status
            ];
        }

        return [
            "orders" => $orders,
            "totalOrders" => $totalOrders,
            "pendingCount" => $pendingCount,
            "shippedCount" => $shippedCount,
            "deliveredCount" => $deliveredCount
        ];
    }
}
?>
