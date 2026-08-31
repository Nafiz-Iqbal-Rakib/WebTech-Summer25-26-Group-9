<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../../Controller/SellerController.php";

$sellerController = new SellerController();
$userId = $_SESSION["user_id"] ?? null;
$sellerData = $sellerController->getSellerProductData($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Portal - Products</title>
    <link rel="stylesheet" href="../Designs/ProductStyle.css">
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

                <a href="/WebTech-Summer25-26-Group-9/View/Seller/Pages/sellerProductPage.php" class="menu-item active">
                    <span>◈</span> Products
                </a>

                <a href="/WebTech-Summer25-26-Group-9/View/Seller/Pages/sellerOrderPage.php" class="menu-item">
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
                    <h1>Products</h1>
                </div>

                <div class="header-right">
                    <span class="live">● Live</span>
                    <span class="date"><?php echo date("M d, Y"); ?></span>
                </div>
            </header>

            <div class="add-product-area">
                <button class="add-product">
                    + ADD PRODUCT
                </button>
            </div>

            <!-- Summary Section -->
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

            <!-- Product Section -->
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
                                    <div class="product-name">
                                        <?php echo htmlspecialchars($product["name"]); ?>
                                    </div>
                                    <div class="product-description">
                                        <?php echo htmlspecialchars($product["description"]); ?>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($product["category"]); ?></td>
                                <td>৳<?php echo number_format($product["price"], 2); ?></td>
                                <td><?php echo $product["stock"]; ?></td>
                                <td>
                                    <span class="status <?php echo $product["statusClass"]; ?>">
                                        <?php echo $product["status"]; ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="edit-btn"
                                            data-id="<?php echo $product['id']; ?>"
                                            data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                            data-description="<?php echo htmlspecialchars($product['description']); ?>"
                                            data-price="<?php echo $product['price']; ?>"
                                            data-stock="<?php echo $product['stock']; ?>">✎ EDIT</button>
                                    <button class="delete-btn"
                                            data-id="<?php echo $product['id']; ?>"
                                            data-name="<?php echo htmlspecialchars($product['name']); ?>">♧ DELETE</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

        </main>

    </div>

    <!-- Add Product Modal -->
    <div class="modal-overlay" id="addProductModal">
        <div class="modal-card">
            <div class="modal-header">
                <h3>+ Add New Product</h3>
                <button class="modal-close" id="closeModalBtn">&times;</button>
            </div>
            <div class="modal-body">
                <form class="modal-form" id="addProductForm" enctype="multipart/form-data">
                    <div class="form-field">
                        <label for="produce_name">Product Name</label>
                        <input type="text" id="produce_name" name="produce_name" placeholder="e.g. Minimalist Oak Lounge Chair" required>
                    </div>

                    <div class="form-field">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Brief product description..." required></textarea>
                    </div>

                    <div class="form-group-row">
                        <div class="form-field">
                            <label for="price">Price (৳)</label>
                            <input type="number" step="0.01" id="price" name="price" placeholder="0.00" required>
                        </div>
                        <div class="form-field">
                            <label for="stock">Stock Quantity</label>
                            <input type="number" id="stock" name="stock" placeholder="0" required>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="product_image">Product Image</label>
                        <input type="file" id="product_image" name="product_image" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" id="cancelModalBtn">CANCEL</button>
                        <button type="submit" class="btn-save">SAVE PRODUCT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal-overlay" id="editProductModal">
        <div class="modal-card">
            <div class="modal-header">
                <h3>✎ Edit Product Details</h3>
                <button class="modal-close" id="closeEditModalBtn">&times;</button>
            </div>
            <div class="modal-body">
                <form class="modal-form" id="editProductForm">
                    <input type="hidden" id="edit_product_id" name="id">

                    <div class="form-field">
                        <label for="edit_produce_name">Product Name</label>
                        <input type="text" id="edit_produce_name" name="produce_name" required>
                    </div>

                    <div class="form-field">
                        <label for="edit_description">Description</label>
                        <textarea id="edit_description" name="description" required></textarea>
                    </div>

                    <div class="form-group-row">
                        <div class="form-field">
                            <label for="edit_price">Price (৳)</label>
                            <input type="number" step="0.01" id="edit_price" name="price" required>
                        </div>
                        <div class="form-field">
                            <label for="edit_stock">Stock Quantity</label>
                            <input type="number" id="edit_stock" name="stock" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" id="cancelEditModalBtn">CANCEL</button>
                        <button type="submit" class="btn-save">UPDATE PRODUCT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Add Modal Elements
        const addProductBtn = document.querySelector(".add-product");
        const modalOverlay = document.getElementById("addProductModal");
        const closeModalBtn = document.getElementById("closeModalBtn");
        const cancelModalBtn = document.getElementById("cancelModalBtn");
        const addProductForm = document.getElementById("addProductForm");

        // Edit Modal Elements
        const editModalOverlay = document.getElementById("editProductModal");
        const closeEditModalBtn = document.getElementById("closeEditModalBtn");
        const cancelEditModalBtn = document.getElementById("cancelEditModalBtn");
        const editProductForm = document.getElementById("editProductForm");

        function openModal(modal) {
            modal.classList.add("active");
        }

        function closeModal(modal, form) {
            modal.classList.remove("active");
            if (form) form.reset();
        }

        if (addProductBtn) {
            addProductBtn.addEventListener("click", function() { openModal(modalOverlay); });
        }

        if (closeModalBtn) closeModalBtn.addEventListener("click", function() { closeModal(modalOverlay, addProductForm); });
        if (cancelModalBtn) cancelModalBtn.addEventListener("click", function() { closeModal(modalOverlay, addProductForm); });

        if (closeEditModalBtn) closeEditModalBtn.addEventListener("click", function() { closeModal(editModalOverlay, editProductForm); });
        if (cancelEditModalBtn) cancelEditModalBtn.addEventListener("click", function() { closeModal(editModalOverlay, editProductForm); });

        modalOverlay.addEventListener("click", function (e) {
            if (e.target === modalOverlay) closeModal(modalOverlay, addProductForm);
        });

        editModalOverlay.addEventListener("click", function (e) {
            if (e.target === editModalOverlay) closeModal(editModalOverlay, editProductForm);
        });

        // Add Product Form Submit
        if (addProductForm) {
            addProductForm.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(addProductForm);

                fetch("/WebTech-Summer25-26-Group-9/Controller/ProductController.php?action=add", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        closeModal(modalOverlay, addProductForm);
                        window.location.reload();
                    } else {
                        alert(data.message || "Failed to add product.");
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Something went wrong. Please try again.");
                });
            });
        }

        // Edit Button Click Handlers
        const editButtons = document.querySelectorAll(".edit-btn");
        editButtons.forEach(btn => {
            btn.addEventListener("click", function() {
                document.getElementById("edit_product_id").value = this.dataset.id;
                document.getElementById("edit_produce_name").value = this.dataset.name;
                document.getElementById("edit_description").value = this.dataset.description;
                document.getElementById("edit_price").value = this.dataset.price;
                document.getElementById("edit_stock").value = this.dataset.stock;

                openModal(editModalOverlay);
            });
        });

        // Edit Product Form Submit
        if (editProductForm) {
            editProductForm.addEventListener("submit", function(e) {
                e.preventDefault();
                const formData = new FormData(editProductForm);

                fetch("/WebTech-Summer25-26-Group-9/Controller/ProductController.php?action=update", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        closeModal(editModalOverlay, editProductForm);
                        window.location.reload();
                    } else {
                        alert(data.message || "Failed to update product.");
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Something went wrong. Please try again.");
                });
            });
        }

        // Delete Button Click Handlers
        const deleteButtons = document.querySelectorAll(".delete-btn");
        deleteButtons.forEach(btn => {
            btn.addEventListener("click", function() {
                const productId = this.dataset.id;
                const productName = this.dataset.name || "this product";

                if (confirm("Are you sure you want to delete " + productName + "?")) {
                    const formData = new FormData();
                    formData.append("id", productId);

                    fetch("/WebTech-Summer25-26-Group-9/Controller/ProductController.php?action=delete", {
                        method: "POST",
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else {
                            alert(data.message || "Failed to delete product.");
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert("Something went wrong. Please try again.");
                    });
                }
            });
        });
    });
    </script>

</body>
</html>
