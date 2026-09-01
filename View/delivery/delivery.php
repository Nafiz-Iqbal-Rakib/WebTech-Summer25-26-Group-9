<?php
$assigned_count = 2;
$delivered_count = 2;

$to_deliver = [
    [
        'id' => '#ORD-006',
        'date' => 'Aug 15, 2026',
        'title' => 'Oslo Lounge Chair',
        'customer' => 'Shirina Akter',
        'price' => '৳12,500',
        'location' => 'Dhaka 1229'
    ],
    [
        'id' => '#ORD-009',
        'date' => 'Aug 17, 2026',
        'title' => 'Rattan Pendant Light',
        'customer' => 'Mim Sultana',
        'price' => '৳10,800',
        'location' => 'Dhaka 1216'
    ]
];

$delivered = [
    [
        'id' => '#ORD-003',
        'date' => 'Aug 12, 2026',
        'title' => 'Marble Side Table',
        'customer' => 'Fatima Khanam',
        'price' => '৳8,900',
        'location' => 'Dhaka 1205'
    ],
    [
        'id' => '#ORD-004',
        'date' => 'Aug 10, 2026',
        'title' => 'Jute Storage Basket',
        'customer' => 'Omar Faruk',
        'price' => '৳2,700',
        'location' => 'Dhaka 1212'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Deliveries - Arabi</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #111111;
        }

       
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            border-bottom: 1px solid #eaeaea;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: -0.5px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 32px;
            height: 32px;
            background-color: #000000;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
        }

        .user-id {
            font-size: 10px;
            color: #888888;
        }

       
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        
        .stats-container {
            display: flex;
            gap: 0;
            border: 1px solid #e5e5e5;
            width: fit-content;
            margin-bottom: 35px;
        }

        .stat-box {
            padding: 12px 25px;
            border-right: 1px solid #e5e5e5;
            min-width: 100px;
        }

        .stat-box:last-child {
            border-right: none;
        }

        .stat-label {
            font-size: 9px;
            color: #888888;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .stat-value {
            font-size: 20px;
            font-weight: bold;
        }

      
        .section-header {
            font-size: 10px;
            font-weight: 700;
            color: #777777;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .badge {
            background-color: #000000;
            color: #ffffff;
            font-size: 9px;
            padding: 1px 5px;
            border-radius: 2px;
        }

     
        .orders-group {
            border: 1px solid #e5e5e5;
            margin-bottom: 35px;
        }

  
        .order-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        .order-card:last-child {
            border-bottom: none;
        }

        .order-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        
        .icon-box {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-black {
            background-color: #000000;
            color: #ffffff;
        }

        .icon-border {
            border: 1px solid #e5e5e5;
            color: #888888;
        }

        .order-details {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .order-meta {
            font-size: 11px;
            color: #999999;
        }

        .order-title {
            font-size: 14px;
            font-weight: 600;
            color: #111111;
        }

        .order-customer {
            font-size: 12px;
            color: #777777;
        }

        .order-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .price-info {
            text-align: right;
        }

        .price {
            font-size: 14px;
            font-weight: 600;
        }

        .location {
            font-size: 11px;
            color: #999999;
        }

        
        .btn-mark {
            background: transparent;
            border: 1px solid #e5e5e5;
            padding: 6px 12px;
            font-size: 9px;
            font-weight: 600;
            color: #666666;
            cursor: pointer;
            letter-spacing: 0.5px;
        }

        .btn-mark:hover {
            background-color: #f9f9f9;
        }

        .arrow {
            color: #cccccc;
            font-size: 12px;
        }
    </style>
</head>
<body>

 
    <div class="navbar">
        <div class="logo">Arabi</div>
        <div class="user-profile">
            <div class="avatar">K</div>
            <div class="user-info">
                <span class="user-name">Karim Hossain</span>
                <span class="user-id">DEL-003</span>
            </div>
        </div>
    </div>

   
    <div class="container">
        <h1 class="page-title">My Deliveries</h1>

       
        <div class="stats-container">
            <div class="stat-box">
                <div class="stat-label">ASSIGNED</div>
                <div class="stat-value"><?php echo $assigned_count; ?></div>
            </div>
            <div class="stat-box">
                <div class="stat-label">DELIVERED</div>
                <div class="stat-value"><?php echo $delivered_count; ?></div>
            </div>
        </div>

        <div class="section-header">
            TO DELIVER <span class="badge"><?php echo count($to_deliver); ?></span>
        </div>
        
        <div class="orders-group">
            <?php foreach ($to_deliver as $item): ?>
                <div class="order-card">
                    <div class="order-left">
                        <div class="icon-box icon-black">
                            
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                        </div>
                        <div class="order-details">
                            <span class="order-meta"><?php echo $item['id']; ?> &nbsp;•&nbsp; <?php echo $item['date']; ?></span>
                            <span class="order-title"><?php echo $item['title']; ?></span>
                            <span class="order-customer">👤 <?php echo $item['customer']; ?></span>
                        </div>
                    </div>
                    <div class="order-right">
                        <div class="price-info">
                            <div class="price"><?php echo $item['price']; ?></div>
                            <div class="location">📍 <?php echo $item['location']; ?></div>
                        </div>
                        <button class="btn-mark">MARK DELIVERED</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        
        <div class="section-header">
            DELIVERED
        </div>

        <div class="orders-group">
            <?php foreach ($delivered as $item): ?>
                <div class="order-card">
                    <div class="order-left">
                        <div class="icon-box icon-border">
                            
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div class="order-details">
                            <span class="order-meta"><?php echo $item['id']; ?> &nbsp;•&nbsp; <?php echo $item['date']; ?></span>
                            <span class="order-title"><?php echo $item['title']; ?></span>
                            <span class="order-customer">👤 <?php echo $item['customer']; ?></span>
                        </div>
                    </div>
                    <div class="order-right">
                        <div class="price-info">
                            <div class="price"><?php echo $item['price']; ?></div>
                            <div class="location">📍 <?php echo $item['location']; ?></div>
                        </div>
                        <span class="arrow">&gt;</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
</html>