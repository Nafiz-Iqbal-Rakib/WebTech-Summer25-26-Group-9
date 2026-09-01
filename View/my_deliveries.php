<?php
require_once '../Controller/DeliveryController.php';
$controller = new DeliveryController();

$assigned_orders = $controller->getAssignedOrders();
$delivered_orders = $controller->getDeliveredOrders();

$assigned_count = mysqli_num_rows($assigned_orders);
$delivered_count = mysqli_num_rows($delivered_orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Deliveries - Arabi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #111111;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 40px;
            border-bottom: 1px solid #eaeaea;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background-color: #000000;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
        }

        .user-id {
            font-size: 11px;
            color: #888888;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .stats-container {
            display: flex;
            margin-bottom: 40px;
        }

        .stat-box {
            border: 1px solid #e5e5e5;
            padding: 16px 28px;
            min-width: 130px;
        }

        .stat-box:first-child {
            border-right: none;
        }

        .stat-label {
            font-size: 10px;
            font-weight: 600;
            color: #888888;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
            color: #666666;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .count-badge {
            background-color: #000000;
            color: #ffffff;
            font-size: 10px;
            padding: 1px 6px;
            border-radius: 2px;
        }

        .order-list {
            border: 1px solid #eeeeee;
            border-radius: 2px;
            margin-bottom: 40px;
        }

        .order-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border-bottom: 1px solid #eeeeee;
        }

        .order-card:last-child {
            border-bottom: none;
        }

        .order-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .icon-box {
            width: 44px;
            height: 44px;
            background-color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 2px;
        }

        .icon-box.delivered {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
        }

        .icon-box svg {
            width: 20px;
            height: 20px;
            fill: #ffffff;
        }

        .icon-box.delivered svg {
            fill: none;
            stroke: #888888;
            stroke-width: 2;
        }

        .order-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .order-meta {
            font-size: 11px;
            color: #aaaaaa;
        }

        .product-name {
            font-size: 14px;
            font-weight: 600;
            color: #111111;
        }

        .customer-name {
            font-size: 12px;
            color: #777777;
        }

        .order-right {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .price-location {
            text-align: right;
        }

        .price {
            font-size: 15px;
            font-weight: 700;
            color: #111111;
            margin-bottom: 4px;
        }

        .location {
            font-size: 11px;
            color: #999999;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 3px;
        }

        .btn-mark {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            color: #666666;
            font-size: 10px;
            font-weight: 600;
            padding: 8px 14px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 2px;
        }

        .btn-mark:hover {
            border-color: #000000;
            color: #000000;
        }

        .arrow-icon {
            color: #ccc;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Arabi</div>
        <div class="user-profile">
            <div class="user-avatar">K</div>
            <div class="user-info">
                <span class="user-name">Karim Hossain</span>
                <span class="user-id">DEL-003</span>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 class="page-title">My Deliveries</h1>

        <div class="stats-container">
            <div class="stat-box">
                <div class="stat-label">ASSIGNED</div>
                <div class="stat-value"><?= $assigned_count; ?></div>
            </div>
            <div class="stat-box">
                <div class="stat-label">DELIVERED</div>
                <div class="stat-value"><?= $delivered_count; ?></div>
            </div>
        </div>

        <div class="section-header">
            TO DELIVER <span class="count-badge"><?= $assigned_count; ?></span>
        </div>
        <div class="order-list">
            <?php while($row = mysqli_fetch_assoc($assigned_orders)): ?>
                <div class="order-card">
                    <div class="order-left">
                        <div class="icon-box">
                            <svg viewBox="0 0 24 24">
                                <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                            </svg>
                        </div>
                        <div class="order-details">
                            <div class="order-meta">#<?= $row['order_code']; ?> &nbsp;•&nbsp; <?= $row['date']; ?></div>
                            <div class="product-name"><?= $row['product_name']; ?></div>
                            <div class="customer-name">👤 <?= $row['customer_name']; ?></div>
                        </div>
                    </div>
                    <div class="order-right">
                        <div class="price-location">
                            <div class="price">৳<?= number_format($row['price']); ?></div>
                            <div class="location">📍 <?= $row['location']; ?></div>
                        </div>
                        <form action="../Controller/DeliveryController.php" method="POST">
                            <input type="hidden" name="order_id" value="<?= $row['id']; ?>">
                            <input type="hidden" name="action" value="mark_delivered">
                            <button type="submit" class="btn-mark">MARK DELIVERED</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="section-header">DELIVERED</div>
        <div class="order-list">
            <?php while($row = mysqli_fetch_assoc($delivered_orders)): ?>
                <div class="order-card">
                    <div class="order-left">
                        <div class="icon-box delivered">
                            <svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div class="order-details">
                            <div class="order-meta">#<?= $row['order_code']; ?> &nbsp;•&nbsp; <?= $row['date']; ?></div>
                            <div class="product-name"><?= $row['product_name']; ?></div>
                            <div class="customer-name">👤 <?= $row['customer_name']; ?></div>
                        </div>
                    </div>
                    <div class="order-right">
                        <div class="price-location">
                            <div class="price">৳<?= number_format($row['price']); ?></div>
                            <div class="location">📍 <?= $row['location']; ?></div>
                        </div>
                        <span class="arrow-icon">›</span>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    </div>

</body>
</html>