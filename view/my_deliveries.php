<?php
require_once __DIR__ . '/../Controller/DeliveryController.php';

$controller = new DeliveryController();
$assignedOrders = $controller->getAssignedDeliveries();
$deliveredOrders = $controller->getDeliveredHistory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Deliveries - Arabi</title>
    <style>
        * { box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        body { background-color: #ffffff; margin: 0; padding: 40px; color: #111; }
        .container { max-width: 900px; margin: 0 auto; }
        
        .navbar { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        .logo { font-size: 22px; font-weight: 700; }
        .user-profile { display: flex; align-items: center; gap: 10px; }
        .avatar { width: 32px; height: 32px; background: #000; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; border-radius: 2px; }
        .user-info { font-size: 12px; }
        .user-info strong { display: block; font-size: 13px; }
        .user-info span { color: #888; font-size: 11px; }

        .page-title { font-size: 18px; margin: 25px 0 20px 0; font-weight: 600; }

        .stats-container { display: flex; gap: 12px; margin-bottom: 30px; }
        .stat-card { border: 1px solid #eaeaea; padding: 12px 20px; min-width: 100px; }
        .stat-label { font-size: 9px; color: #888; font-weight: 700; text-transform: uppercase; margin-bottom: 5px; }
        .stat-value { font-size: 20px; font-weight: 600; }

        .section-header { font-size: 10px; font-weight: 700; color: #888; margin-bottom: 12px; text-transform: uppercase; display: flex; align-items: center; gap: 6px; }
        .badge { background: #000; color: #fff; font-size: 9px; padding: 1px 5px; border-radius: 2px; }

        .order-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 35px; }
        .order-item { border: 1px solid #eeeeee; padding: 14px 18px; display: flex; justify-content: space-between; align-items: center; background: #fff; }
        
        .order-left { display: flex; align-items: center; gap: 12px; }
        .order-icon { width: 36px; height: 36px; background: #f7f7f7; display: flex; align-items: center; justify-content: center; border-radius: 2px; }
        .order-icon svg { width: 16px; height: 16px; fill: #555; }
        
        .order-details { display: flex; flex-direction: column; gap: 2px; }
        .order-meta-top { font-size: 10px; color: #aaa; }
        .product-title { font-size: 13px; font-weight: 600; margin: 0; color: #222; }
        .customer-name { font-size: 11px; color: #666; margin: 0; }

        .order-right { display: flex; align-items: center; gap: 15px; }
        .price-location { text-align: right; }
        .order-price { font-size: 13px; font-weight: 600; margin-bottom: 2px; }
        .order-location { font-size: 10px; color: #888; }

        .btn-mark-delivered { background: #fff; border: 1px solid #ddd; padding: 6px 12px; font-size: 9px; font-weight: 700; cursor: pointer; color: #555; text-transform: uppercase; border-radius: 2px; }
        .btn-mark-delivered:hover { background: #000; color: #fff; border-color: #000; }
        .arrow-icon { color: #ccc; font-size: 14px; }
    </style>
</head>
<body>

<div class="container">
    <div class="navbar">
        <div class="logo">Arabi</div>
        <div class="user-profile">
            <div class="avatar">K</div>
            <div class="user-info">
                <strong>Karim Hossain</strong>
                <span>DEL-003</span>
            </div>
        </div>
    </div>

    <div class="page-title">My Deliveries</div>


    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-label">ASSIGNED</div>
            <div class="stat-value"><?php echo count($assignedOrders); ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">DELIVERED</div>
            <div class="stat-value"><?php echo count($deliveredOrders); ?></div>
        </div>
    </div>

 
    <div class="section-header">
        TO DELIVER <span class="badge"><?php echo count($assignedOrders); ?></span>
    </div>
    
    <div class="order-list">
        <?php foreach ($assignedOrders as $order): ?>
            <div class="order-item">
                <div class="order-left">
                    <div class="order-icon">
                        <svg viewBox="0 0 24 24"><path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
                    </div>
                    <div class="order-details">
                        <div class="order-meta-top">#ORD-00<?php echo $order['id']; ?> &bull; <?php echo date('M d, Y', strtotime($order['created_at'])); ?></div>
                        <h4 class="product-title"><?php echo $order['product_name']; ?></h4>
                        <p class="customer-name">👤 <?php echo $order['customer_name']; ?></p>
                    </div>
                </div>
                <div class="order-right">
                    <div class="price-location">
                        <div class="order-price">৳<?php echo number_format($order['total_price']); ?></div>
                        <div class="order-location">📍 <?php echo $order['address']; ?></div>
                    </div>
                    <button class="btn-mark-delivered" onclick="markDelivered(<?php echo $order['id']; ?>)">MARK DELIVERED</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="section-header">DELIVERED</div>
    
    <div class="order-list">
        <?php foreach ($deliveredOrders as $order): ?>
            <div class="order-item">
                <div class="order-left">
                    <div class="order-icon">
                        <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    </div>
                    <div class="order-details">
                        <div class="order-meta-top">#ORD-00<?php echo $order['id']; ?> &bull; <?php echo date('M d, Y', strtotime($order['created_at'])); ?></div>
                        <h4 class="product-title"><?php echo $order['product_name']; ?></h4>
                        <p class="customer-name">👤 <?php echo $order['customer_name']; ?></p>
                    </div>
                </div>
                <div class="order-right">
                    <div class="price-location">
                        <div class="order-price">৳<?php echo number_format($order['total_price']); ?></div>
                        <div class="order-location">📍 <?php echo $order['address']; ?></div>
                    </div>
                    <span class="arrow-icon">›</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function markDelivered(orderId) {
    const formData = new FormData();
    formData.append('action', 'mark_delivered');
    formData.append('order_id', orderId);

    fetch('../Controller/DeliveryController.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success') {
            location.reload();
        } else {
            alert('Error updating status!');
        }
    });
}
</script>

</body>
</html>
