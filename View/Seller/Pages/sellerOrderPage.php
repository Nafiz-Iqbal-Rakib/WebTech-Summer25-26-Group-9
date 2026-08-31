<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../../Controller/SellerController.php";

$sellerController = new SellerController();
$userId = $_SESSION["user_id"] ?? null;
$sellerOrderData = $sellerController->getSellerOrderData($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Portal - Orders</title>
    <link rel="stylesheet" href="/WebTech-Summer25-26-Group-9/View/Seller/Designs/OrderStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <div class="topbar">
        Arabi Seller Portal — Manage your store
    </div>

    <div class="layout">

        <!-- Sidebar -->
        <aside class="sidebar">

            <div class="logo">
                <span>Arabi</span>
                <small>SELLER</small>
            </div>

            <div class="menu">
                <p class="menu-title">MENU</p>

                <a href="/WebTech-Summer25-26-Group-9/View/Seller/Pages/sellerProductPage.php" class="menu-item">
                    <span>◈</span> Products
                </a>

                <a href="/WebTech-Summer25-26-Group-9/View/Seller/Pages/sellerOrderPage.php" class="menu-item active">
                    <span>▣</span> Orders
                </a>

                <a href="/WebTech-Summer25-26-Group-9/View/Common/Pages/landingPage.php" class="menu-item" style="margin-top: 30px;">
                    <span><i class="fas fa-sign-out-alt"></i></span> Logout
                </a>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="main-content">

            <!-- Header -->
            <header class="header">
                <div>
                    <p class="breadcrumb">MY STORE</p>
                    <h1>Orders</h1>
                </div>

                <div class="live">
                    <span>●</span> Live
                </div>
            </header>

            <!-- Summary Section -->
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

            <!-- Order Section -->
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
                                <td>৳<?php echo number_format($order["amount"], 2); ?></td>
                                <td class="date"><?php echo $order["date"]; ?></td>
                                <td>
                                    <span class="status <?php echo strtolower($order["status"]); ?>">
                                        <?php echo $order["status"]; ?>
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
