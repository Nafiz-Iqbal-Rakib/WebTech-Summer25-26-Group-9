<?php

require_once '../../../Controller/BuyerController.php';


$buyerController = new BuyerController();


/*
DO NOT CHECK LOGIN HERE.

Anyone can open the Cart page.

Login will be checked only when
CHECKOUT NOW is clicked.
*/


$productId = (int)(
    $_GET['product_id']
    ??
    $_POST['product_id']
    ??
    0
);


$product =
    $buyerController->getProduct(
        $productId
    );


$message = '';

$messageClass = '';


if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    &&
    isset($_POST['checkout'])
) {

    /*
    placeOrder() checks whether
    the Buyer is logged in.
    */

    $response =
        $buyerController->placeOrder();


    $message =
        $response['message'];


    $messageClass =
        $response['success']
        ?
        'success-message'
        :
        'error-message';
}


$city =
    $_COOKIE['buyer_city']
    ??
    '';


$quantity = (int)(
    $_POST['quantity']
    ??
    1
);


include '../../Layouts/header.php';

?>


<link rel="stylesheet" href="../Designs/cart.css">


<section class="buyer-cart-page">


    <?php if ($product): ?>


        <form
            method="POST"
            action="Cart.php?product_id=<?= (int)$product['id'] ?>"
            onsubmit="return validateBuyerCart()"
        >


            <input
                type="hidden"
                name="product_id"
                value="<?= (int)$product['id'] ?>"
            >


            <div class="buyer-cart-layout">


                <!-- Selected Product -->


                <div class="selected-product-area">


                    <div class="selected-product-image">

                        <img
                            src="/WebTech-Summer25-26-Group-9/uploads/products/<?= htmlspecialchars($product['img']) ?>"
                            alt="<?= htmlspecialchars($product['product_name']) ?>"
                        >

                    </div>


                    <div class="selected-product-info">


                        <p class="small-label">
                            SELECTED PRODUCT
                        </p>


                        <h1>
                            <?= htmlspecialchars(
                                $product['product_name']
                            ) ?>
                        </h1>


                        <p class="seller-text">

                            Seller:

                            <?= htmlspecialchars(
                                $product['seller_first_name']
                                .
                                ' '
                                .
                                $product['seller_last_name']
                            ) ?>

                        </p>


                        <p class="product-price-large">

                            <?= htmlspecialchars(
                                $product['price']
                            ) ?>

                            TK

                        </p>


                        <p class="product-description">

                            <?= htmlspecialchars(
                                $product['description']
                            ) ?>

                        </p>


                        <p class="stock-text">

                            Available Stock:

                            <?= (int)$product['stock'] ?>

                        </p>


                        <div class="quantity-area">

                            <label for="quantity">
                                Quantity
                            </label>


                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                value="<?= $quantity ?>"
                                data-unit-price="<?= (float)$product['price'] ?>"
                                min="1"
                                max="<?= (int)$product['stock'] ?>"
                            >

                        </div>


                        <a
                            class="back-shop-link"
                            href="../../Common/Pages/shop.php"
                        >
                            Back To Shopping
                        </a>


                    </div>


                </div>


                <!-- Checkout Side -->


                <div class="checkout-side">


                    <!-- Shipping Address -->


                    <div class="checkout-box">


                        <h3>
                            Shipping Address
                        </h3>


                        <select
                            id="country"
                            name="country"
                        >

                            <option value="Bangladesh">
                                Bangladesh
                            </option>

                        </select>


                        <div class="address-row">


                            <input
                                type="text"
                                id="city"
                                name="city"
                                value="<?= htmlspecialchars($city) ?>"
                                placeholder="City"
                            >


                            <input
                                type="text"
                                id="zip"
                                name="zip"
                                placeholder="Zip Code"
                            >


                        </div>


                    </div>


                    <!-- Order Summary -->


                    <div class="checkout-box order-summary-box">


                        <h3>
                            Order Summary
                        </h3>


                        <div class="summary-row">

                            <p>
                                Product Price
                            </p>

                            <p id="summaryProductPrice">

                                <?= htmlspecialchars(
                                    $product['price']
                                ) ?>

                                TK

                            </p>

                        </div>


                        <div class="summary-row">

                            <p>
                                Shipping
                            </p>

                            <p>
                                +100 TK
                            </p>

                        </div>


                        <div class="summary-row">

                            <p>
                                Status
                            </p>

                            <p>
                                PENDING
                            </p>

                        </div>


                        <div class="summary-line"></div>


                        <div class="summary-row total-row">

                            <p>
                                Total
                            </p>


                            <p id="summaryTotal">

                                <?= number_format(

                                    (
                                        (float)$product['price']
                                        *
                                        $quantity
                                    )
                                    +
                                    100,

                                    2

                                ) ?>

                                TK

                            </p>


                        </div>


                        <button
                            type="submit"
                            name="checkout"
                            class="checkout-button"
                        >
                            CHECKOUT NOW
                        </button>


                        <?php
                        if ($message !== ''):
                        ?>

                            <p class="<?= $messageClass ?>">

                                <?= htmlspecialchars(
                                    $message
                                ) ?>

                            </p>

                        <?php
                        endif;
                        ?>


                    </div>


                </div>


            </div>


        </form>


    <?php else: ?>


        <div class="no-product-box">

            <h2>
                No Product Selected
            </h2>

            <p>
                Please select a product from the Shop page.
            </p>

            <a href="../../Common/Pages/shop.php">
                Go To Shop
            </a>

        </div>


    <?php endif; ?>


</section>


<script src="../JS/cart.js"></script>


<?php
include '../../Layouts/footer.php';
?>