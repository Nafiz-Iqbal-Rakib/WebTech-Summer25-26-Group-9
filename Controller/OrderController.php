<?php

require_once __DIR__ . "/../Model/AdminModel.php";

class OrderController
{
    protected $model;

    public function __construct()
    {
        $this->model = new AdminModel();
    }


    public function getOrders()
    {
        /* =========================
           Get Orders
        ========================= */

        $result = $this->model->getAllOrders();

        $orders = [];


        while ($row = $result->fetch_assoc()) {

            /* Delivery Agent */

            if ($row["delivery_first_name"] !== null) {

                $deliveryName =
                    $row["delivery_first_name"] . " " .
                    $row["delivery_last_name"];

                $deliveryInitial =
                    strtoupper(
                        substr($row["delivery_first_name"], 0, 1)
                    );

            } else {

                $deliveryName = null;
                $deliveryInitial = null;
            }


            /* Status Class */

            $status = strtolower($row["status"]);

            if ($status == "pending") {

                $statusClass = "badge-pending";

            } elseif ($status == "processing") {

                $statusClass = "badge-processing";

            } elseif ($status == "shipped") {

                $statusClass = "badge-shipped";

            } elseif ($status == "delivered") {

                $statusClass = "badge-delivered";

            } else {

                $statusClass = "";
            }


            /* Order Data */

            $orders[] = [

                "id" => 
                    $row["id"],

                "customer" =>
                    $row["buyer_first_name"] . " " .
                    $row["buyer_last_name"],

                "seller" =>
                    $row["seller_first_name"] . " " .
                    $row["seller_last_name"],

                "product" => $row["produce_name"],

                "amount" => "৳" . number_format(
                    $row["total_price"]
                ),

                "date" => date(
                    "M d, Y",
                    strtotime($row["created_at"])
                ),

                "status" => strtoupper($row["status"]),

                "statusClass" => $statusClass,

                "delivery" => $deliveryName,

                "deliveryInitial" => $deliveryInitial
            ];
        }


        /* =========================
           Get Delivery Agents
        ========================= */

        $result = $this->model->getAllDeliveryAgents();

        $deliveryAgents = [];


        while ($row = $result->fetch_assoc()) {

            $deliveryAgents[] = [

                "id" => $row["id"],

                "name" =>
                    $row["first_name"] . " " .
                    $row["last_name"]
            ];
        }


        /* =========================
           Return Data
        ========================= */

        return [

            "orders" => $orders,

            "deliveryAgents" => $deliveryAgents

        ];
    }
}

?>