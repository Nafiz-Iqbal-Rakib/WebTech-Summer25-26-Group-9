<?php

require_once __DIR__ . "/Database.php";

class AdminModel
{
    protected $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection();
    }


    // =========================
    // DASHBOARD
    // =========================

    // Total Users
    public function getTotalUsers()
    {
        $sql = "SELECT COUNT(*) AS total_users
                FROM users";

        return $this->connection->query($sql);
    }


    // Delivery Agents
    public function getDeliveryAgents()
    {
        $sql = "SELECT COUNT(*) AS delivery_agents
                FROM users
                WHERE role = 'delivery'";

        return $this->connection->query($sql);
    }


    // Total Products
    public function getTotalProducts()
    {
        $sql = "SELECT COUNT(*) AS total_products
                FROM products";

        return $this->connection->query($sql);
    }


    // Active Listings
    public function getActiveListings()
    {
        $sql = "SELECT COUNT(*) AS active_listings
                FROM products
                WHERE stock > 0";

        return $this->connection->query($sql);
    }


    // Total Orders
    public function getTotalOrders()
    {
        $sql = "SELECT COUNT(*) AS total_orders
                FROM orders";

        return $this->connection->query($sql);
    }


    // Pending Orders Today
    public function getPendingOrdersToday()
    {
        $sql = "SELECT COUNT(*) AS pending_today
                FROM orders
                WHERE status = 'pending'
                AND DATE(created_at) = CURDATE()";

        return $this->connection->query($sql);
    }


    // Assigned Deliveries
    public function getAssignedDeliveries()
    {
        $sql = "SELECT COUNT(*) AS assigned_deliveries
                FROM orders
                WHERE delivery_id IS NOT NULL";

        return $this->connection->query($sql);
    }


    // Unassigned Deliveries
    public function getUnassignedDeliveries()
    {
        $sql = "SELECT COUNT(*) AS unassigned_deliveries
                FROM orders
                WHERE delivery_id IS NULL";

        return $this->connection->query($sql);
    }


    // Recent Orders
    public function getRecentOrders()
    {
        $sql = "SELECT

                    orders.id AS order_id,

                    buyer.first_name AS buyer_first_name,
                    buyer.last_name AS buyer_last_name,

                    seller.first_name AS seller_first_name,
                    seller.last_name AS seller_last_name,

                    products.produce_name,

                    orders.total_price,
                    orders.status,
                    orders.created_at

                FROM orders

                INNER JOIN users AS buyer
                    ON orders.buyer_id = buyer.id

                INNER JOIN users AS seller
                    ON orders.seller_id = seller.id

                INNER JOIN products
                    ON orders.product_id = products.id

                ORDER BY orders.created_at DESC

                LIMIT 5";

        return $this->connection->query($sql);
    }


    // =========================
    // USERS
    // =========================

    // Get All Users
    public function getAllUsers()
    {
        $sql = "SELECT

                    users.id,
                    users.first_name,
                    users.last_name,
                    users.email,
                    users.role,
                    users.status,

                    (
                        SELECT COUNT(*)
                        FROM orders
                        WHERE orders.buyer_id = users.id
                    ) AS total_orders

                FROM users

                ORDER BY users.id DESC";

        return $this->connection->query($sql);
    }


    // Get All Products
    public function getAllProducts()
    {
        $sql = "SELECT
                    products.id,
                    products.produce_name,
                    products.price,
                    products.stock,
                    users.first_name,
                    users.last_name

                FROM products

                INNER JOIN users
                    ON products.seller_id = users.id

                ORDER BY products.id DESC";

        return $this->connection->query($sql);
    }


    // Get All Orders
    public function getAllOrders()
    {
        $sql = "SELECT
                    orders.id,

                    buyer.first_name AS buyer_first_name,
                    buyer.last_name AS buyer_last_name,

                    seller.first_name AS seller_first_name,
                    seller.last_name AS seller_last_name,

                    products.produce_name,

                    orders.total_price,
                    orders.created_at,
                    orders.status,

                    delivery.first_name AS delivery_first_name,
                    delivery.last_name AS delivery_last_name

                FROM orders

                INNER JOIN users AS buyer
                    ON orders.buyer_id = buyer.id

                INNER JOIN users AS seller
                    ON orders.seller_id = seller.id

                INNER JOIN products
                    ON orders.product_id = products.id

                LEFT JOIN users AS delivery
                    ON orders.delivery_id = delivery.id

                ORDER BY orders.created_at DESC";

        return $this->connection->query($sql);
    }


    // Get Delivery Agents
    public function getAllDeliveryAgents()
    {
        $sql = "SELECT
                    id,
                    first_name,
                    last_name

                FROM users

                WHERE role = 'delivery'

                ORDER BY first_name ASC";

        return $this->connection->query($sql);
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
    
        $stmt = $this->connection->prepare($sql);
    
        $stmt->bind_param("i", $id);
    
        return $stmt->execute();
    }

}

?>