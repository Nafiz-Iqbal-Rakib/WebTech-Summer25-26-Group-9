<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sellerControllerFile = __DIR__ . "/../Controller/SellerController.php";
if (file_exists($sellerControllerFile)) {
    require_once $sellerControllerFile;
    $sellerController = new SellerController();
    $userId = $_SESSION["user_id"] ?? null;
    $sellerOrderData = $sellerController->getSellerOrderData($userId);
} else {
    $sellerOrderData = [
        "totalOrders" => 7,
        "pendingCount" => 2,
        "shippedCount" => 1,
        "deliveredCount" => 2,
        "orders" => [
            ["id" => "#ORD-001", "customer" => "Ayaan Rahman", "product" => "Oslo Lounge Chair", "qty" => 1, "amount" => "৳12,500", "date" => "Aug 10, 2026", "status" => "PENDING"],
            ["id" => "#ORD-002", "customer" => "Nadia Islam", "product" => "Linen Throw Pillow Set", "qty" => 2, "amount" => "৳3,600", "date" => "Aug 11, 2026", "status" => "PROCESSING"],
            ["id" => "#ORD-003", "customer" => "Fatima Khanam", "product" => "Marble Side Table", "qty" => 1, "amount" => "৳8,900", "date" => "Aug 12, 2026", "status" => "SHIPPED"],
            ["id" => "#ORD-004", "customer" => "Omar Faruk", "product" => "Rattan Pendant Light", "qty" => 1, "amount" => "৳5,400", "date" => "Aug 13, 2026", "status" => "DELIVERED"],
            ["id" => "#ORD-005", "customer" => "Mim Sultana", "product" => "Minimalist Wall Clock", "qty" => 1, "amount" => "৳2,200", "date" => "Aug 14, 2026", "status" => "PENDING"],
            ["id" => "#ORD-006", "customer" => "Shirina Akter", "product" => "Oslo Lounge Chair", "qty" => 1, "amount" => "৳12,500", "date" => "Aug 15, 2026", "status" => "PROCESSING"],
            ["id" => "#ORD-007", "customer" => "Rakib Hasan", "product" => "Arabi Scented Candle", "qty" => 3, "amount" => "৳1,950", "date" => "Aug 16, 2026", "status" => "DELIVERED"]
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabi Seller Portal - Orders</title>
    <link rel="stylesheet" href="OrderStyle.css">
</head>
<body>

    <div class="topbar">
        Arabi Seller Portal — Manage your store
    </div>

    <div class="layout">
        <aside class="sidebar">
            <div class="logo">
                <span>Arabi</span>
                <small>SELLER</small>
            </div>

            <div class="menu">
                <p class="menu-title">MENU</p>
                <a href="SellerProduct.php" class="menu-item">
                    <span>◈</span> Products
                </a>
                <a href="SellerOrder.php" class="menu-item active">
                    <span>▣</span> Orders
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="header">
                <div>
                    <p class="breadcrumb">MY STORE</p>
                    <h1>Orders</h1>
                </div>

                <div class="live">
                    <span>●</span> Live
                </div>
            </header>

            <section class="summary">
                <div class="summary-card">
                    <p>TOTAL ORDERS</p>
                    <h2><?php echo $sellerOrderData["totalOrders"]; ?></h2>
                </div>

                <div class="summary-card">
                    <p>PENDING</p>
                    <h2><?php echo $sellerOrderData["pendingCount"]; ?></h2>
                </div>

                <div class="summary-card">
                    <p>SHIPPED</p>
                    <h2><?php echo $sellerOrderData["shippedCount"]; ?></h2>
                </div>

                <div class="summary-card">
                    <p>DELIVERED</p>
                    <h2><?php echo $sellerOrderData["deliveredCount"]; ?></h2>
                </div>
            </section>

            <section class="order-section">
                <table>
                    <thead>
                        <tr>
                            <th>ORDER</th>
                            <th>CUSTOMER</th>
                            <th>PRODUCT</th>
                            <th>QTY</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sellerOrderData["orders"] as $order): ?>
                            <tr>
                                <td class="order-id"><?php echo htmlspecialchars($order["id"]); ?></td>
                                <td><?php echo htmlspecialchars($order["customer"]); ?></td>
                                <td class="product"><?php echo htmlspecialchars($order["product"]); ?></td>
                                <td><?php echo $order["qty"]; ?></td>
                                <td><?php echo is_numeric($order["amount"]) ? "৳" . number_format($order["amount"]) : htmlspecialchars($order["amount"]); ?></td>
                                <td class="date"><?php echo htmlspecialchars($order["date"]); ?></td>
                                <td>
                                    <span class="status <?php echo strtolower($order["status"]); ?>">
                                        <?php echo htmlspecialchars($order["status"]); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
