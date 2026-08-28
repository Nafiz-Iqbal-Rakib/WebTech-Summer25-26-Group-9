<?php

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


        // Dashboard Data

        $totalUsers = 10;
        $deliveryAgents = 3;

        $totalProducts = 8;
        $activeListings = 5;

        $totalOrders = 8;
        $pendingToday = 3;

        $deliveriesAssigned = 3;
        $unassignedDeliveries = 5;


        // Recent Orders

        $recentOrders = [

            [
                "id" => "#ORD-001",
                "customer" => "Ayaan Rahman",
                "product" => "Oslo Lounge Chair",
                "amount" => "৳12,500",
                "status" => "PENDING",
                "statusClass" => "badge-pending"
            ],

            [
                "id" => "#ORD-002",
                "customer" => "Nadia Islam",
                "product" => "Linen Throw Pillow Set",
                "amount" => "৳1,800",
                "status" => "PROCESSING",
                "statusClass" => "badge-processing"
            ],

            [
                "id" => "#ORD-003",
                "customer" => "Fatima Khanam",
                "product" => "Marble Side Table",
                "amount" => "৳8,900",
                "status" => "SHIPPED",
                "statusClass" => "badge-shipped"
            ],

            [
                "id" => "#ORD-004",
                "customer" => "Omar Faruk",
                "product" => "Rattan Pendant Light",
                "amount" => "৳5,400",
                "status" => "DELIVERED",
                "statusClass" => "badge-delivered"
            ],

            [
                "id" => "#ORD-005",
                "customer" => "Mim Sultana",
                "product" => "Jute Storage Basket",
                "amount" => "৳900",
                "status" => "PENDING",
                "statusClass" => "badge-pending"
            ]

        ];


        return compact(
            "totalUsers",
            "deliveryAgents",

            "totalProducts",
            "activeListings",

            "totalOrders",
            "pendingToday",

            "deliveriesAssigned",
            "unassignedDeliveries",

            "recentOrders"
        );
    }
}