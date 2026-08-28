<?php

class OrderController
{
    public function getOrders()
    {
        $orders = [

            [
                "id" => "#ORD-001",
                "customer" => "Ayaan Rahman",
                "product" => "Oslo Lounge Chair",
                "amount" => "৳12,500",
                "date" => "Aug 10, 2026",
                "status" => "PENDING",
                "statusClass" => "badge-pending",
                "delivery" => null,
                "deliveryInitial" => null
            ],

            [
                "id" => "#ORD-002",
                "customer" => "Nadia Islam",
                "product" => "Linen Throw Pillow Set",
                "amount" => "৳1,800",
                "date" => "Aug 11, 2026",
                "status" => "PROCESSING",
                "statusClass" => "badge-processing",
                "delivery" => null,
                "deliveryInitial" => null
            ],

            [
                "id" => "#ORD-003",
                "customer" => "Fatima Khanam",
                "product" => "Marble Side Table",
                "amount" => "৳8,900",
                "date" => "Aug 12, 2026",
                "status" => "SHIPPED",
                "statusClass" => "badge-shipped",
                "delivery" => "Karim Hossain",
                "deliveryInitial" => "K"
            ],

            [
                "id" => "#ORD-004",
                "customer" => "Omar Faruk",
                "product" => "Rattan Pendant Light",
                "amount" => "৳5,400",
                "date" => "Aug 13, 2026",
                "status" => "DELIVERED",
                "statusClass" => "badge-delivered",
                "delivery" => "Rafiq Ahmed",
                "deliveryInitial" => "R"
            ],

            [
                "id" => "#ORD-005",
                "customer" => "Mim Sultana",
                "product" => "Jute Storage Basket",
                "amount" => "৳900",
                "date" => "Aug 14, 2026",
                "status" => "PENDING",
                "statusClass" => "badge-pending",
                "delivery" => null,
                "deliveryInitial" => null
            ],

            [
                "id" => "#ORD-006",
                "customer" => "Sumaiya Begum",
                "product" => "Minimalist Wall Clock",
                "amount" => "৳2,200",
                "date" => "Aug 15, 2026",
                "status" => "PROCESSING",
                "statusClass" => "badge-processing",
                "delivery" => null,
                "deliveryInitial" => null
            ],

            [
                "id" => "#ORD-007",
                "customer" => "Shirina Akter",
                "product" => "Cedar Bookshelf",
                "amount" => "৳16,000",
                "date" => "Aug 16, 2026",
                "status" => "PENDING",
                "statusClass" => "badge-pending",
                "delivery" => null,
                "deliveryInitial" => null
            ],

            [
                "id" => "#ORD-008",
                "customer" => "Ayaan Rahman",
                "product" => "Arabi Scented Candle",
                "amount" => "৳650",
                "date" => "Aug 17, 2026",
                "status" => "SHIPPED",
                "statusClass" => "badge-shipped",
                "delivery" => "Tariq Miah",
                "deliveryInitial" => "T"
            ]

        ];


        $deliveryAgents = [

            [
                "id" => 1,
                "name" => "Karim Hossain"
            ],

            [
                "id" => 2,
                "name" => "Rafiq Ahmed"
            ],

            [
                "id" => 3,
                "name" => "Tariq Miah"
            ]

        ];


        return [
            "orders" => $orders,
            "deliveryAgents" => $deliveryAgents
        ];
    }
}