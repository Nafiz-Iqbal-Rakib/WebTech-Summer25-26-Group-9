<?php

require_once '../../../Controller/ShopController.php';

$shopController = new ShopController();
$products = $shopController->getProducts();

include '../../Layouts/header.php';

?>

<main class="shop-main-content">

    <!-- Shop Top Bar -->
    <div class="shop-top-bar">

        <!-- Sort -->
        <div class="sort-options">

            <label for="sort">Sort by:</label>

            <select id="sort">
                <option>Relevance</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Newest</option>
                <option>Top Rated</option>
            </select>

        </div>


        <!-- Search -->
        <div class="shop-search">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                placeholder="Search products..."
            >

        </div>

    </div>


    <!-- Product Grid -->
    <div class="product-grid">

        <?php foreach ($products as $product): ?>

            <div class="product-wrapper">

                <div class="product-card">

                    <!-- Product Image -->
                    <div class="product-image">

                        <img
                            src="<?= $product['image'] ?>"
                            alt="<?= htmlspecialchars($product['name']) ?>"
                        >

                    </div>


                    <!-- Product Information -->
                    <div class="product-info">

                        <h3 class="product-name">
                            <?= htmlspecialchars($product['name']) ?>
                        </h3>


                        <!-- Rating -->
                        <div class="product-rating">

                            <?php for ($i = 1; $i <= 5; $i++): ?>

                                <?php if ($i <= $product['rating']): ?>

                                    <i class="fa-solid fa-star"></i>

                                <?php else: ?>

                                    <i class="fa-regular fa-star"></i>

                                <?php endif; ?>

                            <?php endfor; ?>

                        </div>


                        <!-- Price -->
                        <div class="product-price">

                            <span class="current-price">
                                <?= $product['price'] ?> TK
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Order Now -->
                <a
                    class="buy-now-btn"
                    href="../../Buyer/Pages/Cart.php?product_id=<?= (int)$product['id'] ?>"
                >
                    ORDER NOW
                </a>

            </div>

        <?php endforeach; ?>

    </div>


    <!-- Pagination -->
    <div class="pagination">

        <button class="page-btn active">1</button>

        <button class="page-btn">2</button>

        <button class="page-btn">3</button>

        <button class="page-btn next">
            Next
        </button>

    </div>

</main>

<?php include '../../Layouts/footer.php'; ?>