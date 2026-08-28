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
                            <th>SELLER</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($products as $product): ?>

                            <tr>

                                <!-- ID -->

                                <td class="text-muted">
                                    <?php echo $product["id"]; ?>
                                </td>


                                <!-- NAME -->

                                <td class="product-name-bold">
                                    <?php echo $product["name"]; ?>
                                </td>


                                <!-- SELLER -->

                                <td class="text-muted">
                                    <?php echo $product["seller"]; ?>
                                </td>


                                <!-- PRICE -->

                                <td>
                                    <?php echo $product["price"]; ?>
                                </td>


                                <!-- STOCK -->

                                <td>
                                    <?php echo $product["stock"]; ?>
                                </td>


                                <!-- STATUS -->

                                <td>

                                    <span class="badge-status-outline <?php echo $product["statusClass"]; ?>">
                                        <?php echo $product["status"]; ?>
                                    </span>

                                </td>


                                <!-- ACTION -->

                                <td>

                                    <button
                                        type="button"
                                        class="delete-product-btn"
                                    >
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