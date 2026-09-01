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

    <link
        rel="stylesheet"
        href="../Designs/ProductStyle.css"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

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

            <p class="menu-title">
                MENU
            </p>


            <a
                href="/WebTech-Summer25-26-Group-9/View/Seller/Pages/sellerProductPage.php"
                class="menu-item active"
            >
                <span>◈</span>
                Products
            </a>


            <a
                href="/WebTech-Summer25-26-Group-9/View/Seller/Pages/sellerOrderPage.php"
                class="menu-item"
            >
                <span>▣</span>
                Orders
            </a>


            <a
                href="/WebTech-Summer25-26-Group-9/View/Common/Pages/landingPage.php"
                class="menu-item"
                style="margin-top: 30px;"
            >
                <span>
                    <i class="fas fa-sign-out-alt"></i>
                </span>

                Logout
            </a>

        </div>

    </aside>


    <main class="main-content">


        <header class="header">

            <div>

                <p class="breadcrumb">
                    MY STORE
                </p>

                <h1>
                    Products
                </h1>

            </div>


            <div class="header-right">

                <span class="live">
                    ● Live
                </span>

                <span class="date">
                    <?php echo date("M d, Y"); ?>
                </span>

            </div>

        </header>


        <div class="add-product-area">

            <button
                class="add-product"
                type="button"
            >
                + ADD PRODUCT
            </button>

        </div>


        <section class="summary">


            <div class="summary-card">

                <p>
                    TOTAL PRODUCTS
                </p>

                <h2>
                    <?php
                    echo $sellerData["totalProducts"];
                    ?>
                </h2>

            </div>


            <div class="summary-card">

                <p>
                    ACTIVE
                </p>

                <h2>
                    <?php
                    echo $sellerData["activeCount"];
                    ?>
                </h2>

            </div>


            <div class="summary-card">

                <p>
                    LOW / OUT OF STOCK
                </p>

                <h2>
                    <?php
                    echo $sellerData["lowOrOutStock"];
                    ?>
                </h2>

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

                    <?php if (empty($sellerData["products"])): ?>

                        <tr>

                            <td
                                colspan="6"
                                style="text-align:center;"
                            >
                                No products found.
                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($sellerData["products"] as $product): ?>

                            <tr>

                                <td>

                                    <div class="product-name">

                                        <?php
                                        echo htmlspecialchars(
                                            $product["name"]
                                        );
                                        ?>

                                    </div>


                                    <div class="product-description">

                                        <?php
                                        echo htmlspecialchars(
                                            $product["description"]
                                        );
                                        ?>

                                    </div>

                                </td>


                                <td>

                                    <?php
                                    echo htmlspecialchars(
                                        $product["category"]
                                    );
                                    ?>

                                </td>


                                <td>

                                    ৳<?php
                                    echo number_format(
                                        $product["price"],
                                        2
                                    );
                                    ?>

                                </td>


                                <td>

                                    <?php
                                    echo (int)$product["stock"];
                                    ?>

                                </td>


                                <td>

                                    <span
                                        class="status <?php echo htmlspecialchars($product["statusClass"]); ?>"
                                    >

                                        <?php
                                        echo htmlspecialchars(
                                            $product["status"]
                                        );
                                        ?>

                                    </span>

                                </td>


                                <td>

                                    <button
                                        type="button"
                                        class="edit-btn"

                                        data-id="<?php
                                        echo htmlspecialchars(
                                            $product["id"]
                                        );
                                        ?>"

                                        data-name="<?php
                                        echo htmlspecialchars(
                                            $product["name"],
                                            ENT_QUOTES
                                        );
                                        ?>"

                                        data-description="<?php
                                        echo htmlspecialchars(
                                            $product["description"],
                                            ENT_QUOTES
                                        );
                                        ?>"

                                        data-price="<?php
                                        echo htmlspecialchars(
                                            $product["price"]
                                        );
                                        ?>"

                                        data-stock="<?php
                                        echo htmlspecialchars(
                                            $product["stock"]
                                        );
                                        ?>"
                                    >
                                        ✎ EDIT
                                    </button>


                                    <button
                                        type="button"
                                        class="delete-btn"

                                        data-id="<?php
                                        echo htmlspecialchars(
                                            $product["id"]
                                        );
                                        ?>"

                                        data-name="<?php
                                        echo htmlspecialchars(
                                            $product["name"],
                                            ENT_QUOTES
                                        );
                                        ?>"
                                    >
                                        ♧ DELETE
                                    </button>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </section>

    </main>

</div>


<div
    class="modal-overlay"
    id="addProductModal"
>

    <div class="modal-card">

        <div class="modal-header">

            <h3>
                + Add New Product
            </h3>

            <button
                type="button"
                class="modal-close"
                id="closeModalBtn"
            >
                &times;
            </button>

        </div>


        <div class="modal-body">

            <form
                class="modal-form"
                id="addProductForm"
                enctype="multipart/form-data"
            >

                <div class="form-field">

                    <label for="product_name">
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        placeholder="e.g. Minimalist Oak Lounge Chair"
                        required
                    >

                </div>


                <div class="form-field">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Brief product description..."
                        required
                    ></textarea>

                </div>


                <div class="form-group-row">

                    <div class="form-field">

                        <label for="price">
                            Price (৳)
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            id="price"
                            name="price"
                            placeholder="0.00"
                            required
                        >

                    </div>


                    <div class="form-field">

                        <label for="stock">
                            Stock Quantity
                        </label>

                        <input
                            type="number"
                            min="0"
                            id="stock"
                            name="stock"
                            placeholder="0"
                            required
                        >

                    </div>

                </div>


                <div class="form-field">

                    <label for="product_image">
                        Product Image
                    </label>

                    <input
                        type="file"
                        id="product_image"
                        name="product_image"
                        accept="image/*"
                    >

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-cancel"
                        id="cancelModalBtn"
                    >
                        CANCEL
                    </button>

                    <button
                        type="submit"
                        class="btn-save"
                    >
                        SAVE PRODUCT
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<div
    class="modal-overlay"
    id="editProductModal"
>

    <div class="modal-card">

        <div class="modal-header">

            <h3>
                ✎ Edit Product Details
            </h3>

            <button
                type="button"
                class="modal-close"
                id="closeEditModalBtn"
            >
                &times;
            </button>

        </div>


        <div class="modal-body">

            <form
                class="modal-form"
                id="editProductForm"
            >

                <input
                    type="hidden"
                    id="edit_product_id"
                    name="id"
                >


                <div class="form-field">

                    <label for="edit_product_name">
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="edit_product_name"
                        name="product_name"
                        required
                    >

                </div>


                <div class="form-field">

                    <label for="edit_description">
                        Description
                    </label>

                    <textarea
                        id="edit_description"
                        name="description"
                        required
                    ></textarea>

                </div>


                <div class="form-group-row">

                    <div class="form-field">

                        <label for="edit_price">
                            Price (৳)
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            id="edit_price"
                            name="price"
                            required
                        >

                    </div>


                    <div class="form-field">

                        <label for="edit_stock">
                            Stock Quantity
                        </label>

                        <input
                            type="number"
                            min="0"
                            id="edit_stock"
                            name="stock"
                            required
                        >

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-cancel"
                        id="cancelEditModalBtn"
                    >
                        CANCEL
                    </button>

                    <button
                        type="submit"
                        class="btn-save"
                    >
                        UPDATE PRODUCT
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

document.addEventListener("DOMContentLoaded", function () {


    const addProductBtn =
        document.querySelector(".add-product");

    const modalOverlay =
        document.getElementById("addProductModal");

    const closeModalBtn =
        document.getElementById("closeModalBtn");

    const cancelModalBtn =
        document.getElementById("cancelModalBtn");

    const addProductForm =
        document.getElementById("addProductForm");


    const editModalOverlay =
        document.getElementById("editProductModal");

    const closeEditModalBtn =
        document.getElementById("closeEditModalBtn");

    const cancelEditModalBtn =
        document.getElementById("cancelEditModalBtn");

    const editProductForm =
        document.getElementById("editProductForm");


    function openModal(modal) {

        if (modal) {
            modal.classList.add("active");
        }

    }


    function closeModal(modal, form) {

        if (modal) {
            modal.classList.remove("active");
        }

        if (form) {
            form.reset();
        }

    }


    if (addProductBtn) {

        addProductBtn.addEventListener(
            "click",
            function () {

                openModal(modalOverlay);

            }
        );

    }


    if (closeModalBtn) {

        closeModalBtn.addEventListener(
            "click",
            function () {

                closeModal(
                    modalOverlay,
                    addProductForm
                );

            }
        );

    }


    if (cancelModalBtn) {

        cancelModalBtn.addEventListener(
            "click",
            function () {

                closeModal(
                    modalOverlay,
                    addProductForm
                );

            }
        );

    }


    if (closeEditModalBtn) {

        closeEditModalBtn.addEventListener(
            "click",
            function () {

                closeModal(
                    editModalOverlay,
                    editProductForm
                );

            }
        );

    }


    if (cancelEditModalBtn) {

        cancelEditModalBtn.addEventListener(
            "click",
            function () {

                closeModal(
                    editModalOverlay,
                    editProductForm
                );

            }
        );

    }


    if (modalOverlay) {

        modalOverlay.addEventListener(
            "click",
            function (e) {

                if (e.target === modalOverlay) {

                    closeModal(
                        modalOverlay,
                        addProductForm
                    );

                }

            }
        );

    }


    if (editModalOverlay) {

        editModalOverlay.addEventListener(
            "click",
            function (e) {

                if (e.target === editModalOverlay) {

                    closeModal(
                        editModalOverlay,
                        editProductForm
                    );

                }

            }
        );

    }


    // =====================================================
    // ADD PRODUCT
    // =====================================================

    if (addProductForm) {

        addProductForm.addEventListener(
            "submit",
            async function (e) {

                e.preventDefault();


                const formData =
                    new FormData(addProductForm);


                try {

                    const response =
                        await fetch(
                            "/WebTech-Summer25-26-Group-9/Controller/SellerController.php?action=add",
                            {
                                method: "POST",
                                body: formData
                            }
                        );


                    const responseText =
                        await response.text();


                    let data;


                    try {

                        data =
                            JSON.parse(responseText);

                    } catch (jsonError) {

                        console.error(
                            "Server Response:",
                            responseText
                        );

                        alert(
                            "Server returned an invalid response:\n\n" +
                            responseText
                        );

                        return;
                    }


                    if (data.success) {

                        alert(
                            data.message ||
                            "Product added successfully."
                        );

                        closeModal(
                            modalOverlay,
                            addProductForm
                        );

                        window.location.reload();

                    } else {

                        alert(
                            data.message ||
                            "Failed to add product."
                        );

                    }

                } catch (error) {

                    console.error(
                        "Add Product Error:",
                        error
                    );

                    alert(
                        "Something went wrong. Please try again."
                    );

                }

            }
        );

    }


    // =====================================================
    // EDIT BUTTON
    // =====================================================

    const editButtons =
        document.querySelectorAll(".edit-btn");


    editButtons.forEach(
        function (btn) {

            btn.addEventListener(
                "click",
                function () {

                    document.getElementById(
                        "edit_product_id"
                    ).value =
                        this.dataset.id;


                    document.getElementById(
                        "edit_product_name"
                    ).value =
                        this.dataset.name;


                    document.getElementById(
                        "edit_description"
                    ).value =
                        this.dataset.description;


                    document.getElementById(
                        "edit_price"
                    ).value =
                        this.dataset.price;


                    document.getElementById(
                        "edit_stock"
                    ).value =
                        this.dataset.stock;


                    openModal(
                        editModalOverlay
                    );

                }
            );

        }
    );


    // =====================================================
    // UPDATE PRODUCT
    // =====================================================

    if (editProductForm) {

        editProductForm.addEventListener(
            "submit",
            async function (e) {

                e.preventDefault();


                const formData =
                    new FormData(editProductForm);


                try {

                    const response =
                        await fetch(
                            "/WebTech-Summer25-26-Group-9/Controller/SellerController.php?action=update",
                            {
                                method: "POST",
                                body: formData
                            }
                        );


                    const responseText =
                        await response.text();


                    let data;


                    try {

                        data =
                            JSON.parse(responseText);

                    } catch (jsonError) {

                        console.error(
                            "Server Response:",
                            responseText
                        );

                        alert(
                            "Server returned an invalid response:\n\n" +
                            responseText
                        );

                        return;
                    }


                    if (data.success) {

                        alert(
                            data.message ||
                            "Product updated successfully."
                        );

                        closeModal(
                            editModalOverlay,
                            editProductForm
                        );

                        window.location.reload();

                    } else {

                        alert(
                            data.message ||
                            "Failed to update product."
                        );

                    }

                } catch (error) {

                    console.error(
                        "Update Product Error:",
                        error
                    );

                    alert(
                        "Something went wrong. Please try again."
                    );

                }

            }
        );

    }


    // =====================================================
    // DELETE PRODUCT
    // =====================================================

    const deleteButtons =
        document.querySelectorAll(".delete-btn");


    deleteButtons.forEach(
        function (btn) {

            btn.addEventListener(
                "click",
                async function () {

                    const productId =
                        this.dataset.id;

                    const productName =
                        this.dataset.name ||
                        "this product";


                    const confirmed =
                        confirm(
                            "Are you sure you want to delete " +
                            productName +
                            "?"
                        );


                    if (!confirmed) {
                        return;
                    }


                    const formData =
                        new FormData();


                    formData.append(
                        "id",
                        productId
                    );


                    try {

                        const response =
                            await fetch(
                                "/WebTech-Summer25-26-Group-9/Controller/SellerController.php?action=delete",
                                {
                                    method: "POST",
                                    body: formData
                                }
                            );


                        const responseText =
                            await response.text();


                        let data;


                        try {

                            data =
                                JSON.parse(responseText);

                        } catch (jsonError) {

                            console.error(
                                "Server Response:",
                                responseText
                            );

                            alert(
                                "Server returned an invalid response:\n\n" +
                                responseText
                            );

                            return;
                        }


                        if (data.success) {

                            alert(
                                data.message ||
                                "Product deleted successfully."
                            );

                            window.location.reload();

                        } else {

                            alert(
                                data.message ||
                                "Failed to delete product."
                            );

                        }

                    } catch (error) {

                        console.error(
                            "Delete Product Error:",
                            error
                        );

                        alert(
                            "Something went wrong. Please try again."
                        );

                    }

                }
            );

        }
    );

});

</script>


</body>

</html>