<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sellerControllerFile = __DIR__ . "/../Controller/SellerController.php";
if (file_exists($sellerControllerFile)) {
    require_once $sellerControllerFile;
    $sellerController = new SellerController();
    $userId = $_SESSION["user_id"] ?? null;
    $sellerData = $sellerController->getSellerProductData($userId);
} else {
    $sellerData = [
        "totalProducts" => 6,
        "activeCount" => 3,
        "lowOrOutStock" => 3,
        "products" => [
            ["id" => 1, "name" => "Oslo Lounge Chair", "description" => "Minimalist Scandinavian lounge chair", "category" => "Furniture", "price" => 12500, "stock" => 8, "status" => "ACTIVE", "statusClass" => "active-status"],
            ["id" => 2, "name" => "Linen Throw Pillow Set", "description" => "Set of 2 hand-stitched linen throw pillows", "category" => "Textiles", "price" => 1800, "stock" => 3, "status" => "LOW STOCK", "statusClass" => "low-status"],
            ["id" => 3, "name" => "Marble Side Table", "description" => "Honed white marble top with a brushed", "category" => "Furniture", "price" => 8900, "stock" => 12, "status" => "ACTIVE", "statusClass" => "active-status"],
            ["id" => 4, "name" => "Arabi Scented Candle", "description" => "100% soy wax candle with oud and amber", "category" => "Decor", "price" => 650, "stock" => 0, "status" => "OUT OF STOCK", "statusClass" => "out-status"],
            ["id" => 5, "name" => "Rattan Pendant Light", "description" => "Hand-woven rattan shade with a 1.5m", "category" => "Lighting", "price" => 5400, "stock" => 6, "status" => "ACTIVE", "statusClass" => "active-status"],
            ["id" => 6, "name" => "Minimalist Wall Clock", "description" => "Silent sweep mechanism, powder-coated", "category" => "Decor", "price" => 2200, "stock" => 2, "status" => "LOW STOCK", "statusClass" => "low-status"]
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabi Seller Portal - Products</title>
    <link rel="stylesheet" href="ProductStyle.css">
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
                <a href="SellerProduct.php" class="menu-item active">
                    <span>◈</span> Products
                </a>
                <a href="SellerOrder.php" class="menu-item">
                    <span>▣</span> Orders
                </a>
            </div>

            <div class="seller-profile">
                <div class="seller-icon">S</div>
                <div>
                    <strong>Seller</strong>
                    <p>seller@arabi.com</p>
                </div>
                <span class="logout">↪</span>
            </div>
        </aside>

        <main class="main-content">
            <header class="header">
                <div>
                    <p class="breadcrumb">MY STORE</p>
                    <h1>Products</h1>
                </div>

                <div class="header-right">
                    <span class="live">● Live</span>
                    <span class="date"><?php echo date("M d, Y"); ?></span>
                </div>
            </header>

            <div class="add-product-area">
                <button class="add-product">+ ADD PRODUCT</button>
            </div>

            <section class="summary">
                <div class="summary-card">
                    <p>TOTAL PRODUCTS</p>
                    <h2><?php echo $sellerData["totalProducts"]; ?></h2>
                </div>

                <div class="summary-card">
                    <p>ACTIVE</p>
                    <h2><?php echo $sellerData["activeCount"]; ?></h2>
                </div>

                <div class="summary-card">
                    <p>LOW / OUT OF STOCK</p>
                    <h2><?php echo $sellerData["lowOrOutStock"]; ?></h2>
                </div>
            </section>

            <section class="product-section">
                <table>
                    <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sellerData["products"] as $product): ?>
                            <tr>
                                <td>
                                    <div class="product-name"><?php echo htmlspecialchars($product["name"]); ?></div>
                                    <div class="product-description"><?php echo htmlspecialchars($product["description"]); ?></div>
                                </td>
                                <td><?php echo htmlspecialchars($product["category"]); ?></td>
                                <td>৳<?php echo number_format($product["price"]); ?></td>
                                <td><?php echo $product["stock"]; ?></td>
                                <td>
                                    <span class="status <?php echo $product["statusClass"]; ?>">
                                        <?php echo $product["status"]; ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="edit-btn">✎ EDIT</button>
                                    <button class="delete-btn">♧ DELETE</button>
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
