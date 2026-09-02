<?php

require_once __DIR__ . "/../Model/AdminModel.php";

class DashboardController
{
    public function getDashboardData()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["email"])) {
            header("Location: /WebTech-Summer25-26-Group-9/View/Common/Pages/loginPage.php");
            exit;
        }

        $adminModel = new AdminModel();


        // Dashboard Statistics

        $totalUsersResult = $adminModel->getTotalUsers();
        $deliveryAgentsResult = $adminModel->getDeliveryAgents();

        $totalProductsResult = $adminModel->getTotalProducts();
        $activeListingsResult = $adminModel->getActiveListings();

        $totalOrdersResult = $adminModel->getTotalOrders();
        $pendingTodayResult = $adminModel->getPendingOrdersToday();

        $assignedDeliveriesResult = $adminModel->getAssignedDeliveries();
        $unassignedDeliveriesResult = $adminModel->getUnassignedDeliveries();


        // Convert Database Results

        $totalUsers = $totalUsersResult->fetch_row()[0];
        $deliveryAgents = $deliveryAgentsResult->fetch_row()[0];

        $totalProducts = $totalProductsResult->fetch_row()[0];
        $activeListings = $activeListingsResult->fetch_row()[0];

        $totalOrders = $totalOrdersResult->fetch_row()[0];
        $pendingToday = $pendingTodayResult->fetch_row()[0];

        $deliveriesAssigned = $assignedDeliveriesResult->fetch_row()[0];
        $unassignedDeliveries = $unassignedDeliveriesResult->fetch_row()[0];


        // Recent Orders

        $recentOrdersResult = $adminModel->getRecentOrders();

        $recentOrders = [];

        while ($row = $recentOrdersResult->fetch_assoc()) {

            $status = strtoupper($row["status"]);

            $recentOrders[] = [

                "id" => $row["order_id"],

                "customer" =>
                    $row["buyer_first_name"] . " " .
                    $row["buyer_last_name"],

                "seller" =>
                    $row["seller_first_name"] . " " .
                    $row["seller_last_name"],

                "product" => $row["product_name"],

                "amount" => $row["total_price"],

                "status" => $status,


                "created_at" => date(
                    "d M Y, h:i A",
                    strtotime($row["created_at"])
                )
            ];
        }


        // Return Dashboard Data

        return [

            "totalUsers" => $totalUsers,
            "deliveryAgents" => $deliveryAgents,

            "totalProducts" => $totalProducts,
            "activeListings" => $activeListings,

            "totalOrders" => $totalOrders,
            "pendingToday" => $pendingToday,

            "deliveriesAssigned" => $deliveriesAssigned,
            "unassignedDeliveries" => $unassignedDeliveries,

            "recentOrders" => $recentOrders
        ];
    }
}

?>