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


            <!-- Page Header -->

            <div class="page-header">

                <div>
                    <p class="section-subtitle">MANAGE</p>
                    <h1 class="page-title">Products</h1>
                </div>


                <!-- Search -->

                <div class="search-container">

                    <input
                        type="text"
                        placeholder="Search products..."
                        class="search-input"
                        id="productSearch"
                    >

                </div>

            </div>


            <!-- Product Table -->

            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>SELLER</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody id="productTableBody">

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


<script>

const searchInput = document.getElementById("productSearch");

searchInput.addEventListener("input", function () {

    const searchValue = this.value.toLowerCase().trim();

    const rows = document.querySelectorAll("#productTableBody tr");

    rows.forEach(function (row) {

        const productName = row
            .querySelector(".product-name-bold")
            .textContent
            .toLowerCase();

        const seller = row
            .querySelector(".text-muted")
            .textContent
            .toLowerCase();

        if (
            productName.includes(searchValue) ||
            seller.includes(searchValue)
        ) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }

    });

});

</script>