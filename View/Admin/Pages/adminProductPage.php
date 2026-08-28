<?php

include "../../../Controller/ProductController.php";

$controller = new ProductController();

$products = $controller->getProducts();

?>

<?php include '../../Layouts/header.php'; ?>

<div class="app-container">

    <!-- Sidebar / Aside -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">

        <div class="content-body">

            <p class="section-subtitle">MANAGE</p>
            <h1 class="page-title">Products</h1>


            <div class="table-container">

                <table>

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php foreach ($products as $product): ?>

                            <tr>

                                <td class="text-muted">
                                    <?php echo $product["id"]; ?>
                                </td>

                                <td class="product-name-bold">
                                    <?php echo $product["name"]; ?>
                                </td>

                                <td class="text-muted">
                                    <?php echo $product["category"]; ?>
                                </td>

                                <td>
                                    <?php echo $product["price"]; ?>
                                </td>

                                <td>
                                    <?php echo $product["stock"]; ?>
                                </td>

                                <td>
                                    <span class="badge-status-outline <?php echo $product["statusClass"]; ?>">
                                        <?php echo $product["status"]; ?>
                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="delete-product-btn">
                                        Delete
                                    </button>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>