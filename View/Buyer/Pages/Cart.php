<?php

include "../../../Controller/BuyerController.php";


$buyerController =
    new BuyerController();


$productId =
    $_GET["product_id"]
    ??
    $_POST["product_id"]
    ??
    "";


$product =
    $buyerController->getProduct(
        $productId
    );


$message = "";
$messageClass = "";


if(
    $_SERVER["REQUEST_METHOD"] == "POST"
    &&
    isset($_POST["checkout"])
)
{
    $response =
        $buyerController->placeOrder();


    $message =
        $response["message"];


    if($response["success"])
    {
        $messageClass =
            "success-message";
    }
    else
    {
        $messageClass =
            "error-message";
    }
}


$city =
    $_COOKIE["buyer_city"]
    ??
    "";


$quantity =
    $_POST["quantity"]
    ??
    1;


$productTotal = 0;
$finalTotal = 0;


if($product)
{
    $productTotal =
        $product["price"] *
        $quantity;

    $finalTotal =
        $productTotal +
        100;
}


include "../../Layouts/header.php";

?>


<link
    rel="stylesheet"
    href="../Designs/cart.css"
>


<section class="buyer-cart-page">


<?php

if($product)
{

?>


<form
    method="POST"
    action="Cart.php?product_id=<?php echo $product["id"]; ?>"
    onsubmit="return validateBuyerCart()"
>


<input
    type="hidden"
    name="product_id"
    value="<?php echo $product["id"]; ?>"
>


<input
    type="hidden"
    id="unitPrice"
    value="<?php echo $product["price"]; ?>"
>


<div class="buyer-cart-layout">


    <div class="selected-product-area">


        <div class="selected-product-image">

            <img
                src="/WebTech-Summer25-26-Group-9/uploads/products/<?php echo $product["img"]; ?>"
                alt="<?php echo $product["product_name"]; ?>"
            >

        </div>


        <div class="selected-product-info">


            <p class="small-label">
                SELECTED PRODUCT
            </p>


            <h1>
                <?php
                echo $product["product_name"];
                ?>
            </h1>


            <p class="seller-text">

                Seller:

                <?php
                echo
                    $product["seller_first_name"]
                    .
                    " "
                    .
                    $product["seller_last_name"];
                ?>

            </p>


            <p class="product-price-large">

                <?php
                echo $product["price"];
                ?>

                TK

            </p>


            <p class="product-description">

                <?php
                echo $product["description"];
                ?>

            </p>


            <p class="stock-text">

                Available Stock:

                <?php
                echo $product["stock"];
                ?>

            </p>


            <div class="quantity-area">

                <label for="quantity">
                    Quantity
                </label>


                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    value="<?php echo $quantity; ?>"
                    min="1"
                    max="<?php echo $product["stock"]; ?>"
                    onkeyup="updateBuyerCartTotal()"
                    onchange="updateBuyerCartTotal()"
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


    <div class="checkout-side">


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
                    class="city-input"
                    id="city"
                    name="city"
                    value="<?php echo $city; ?>"
                    placeholder="City"
                >


                <input
                    type="text"
                    class="zip-input"
                    id="zip"
                    name="zip"
                    placeholder="Zip Code"
                >


            </div>


        </div>


        <div class="checkout-box order-summary-box">


            <h3>
                Order Summary
            </h3>


            <div class="summary-row">

                <p class="summary-left">
                    Product Price
                </p>


                <p
                    class="summary-right"
                    id="summaryProductPrice"
                >

                    <?php
                    echo $productTotal;
                    ?>

                    TK

                </p>

            </div>


            <div class="summary-row">

                <p class="summary-left">
                    Shipping
                </p>


                <p class="summary-right">
                    +100 TK
                </p>

            </div>


            <div class="summary-row">

                <p class="summary-left">
                    Status
                </p>


                <p class="summary-right">
                    PENDING
                </p>

            </div>


            <div class="summary-line"></div>


            <div class="summary-row total-row">

                <p class="summary-left">
                    Total
                </p>


                <p
                    class="summary-right"
                    id="summaryTotal"
                >

                    <?php
                    echo $finalTotal;
                    ?>

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

if($message != "")
{

?>

            <p class="<?php echo $messageClass; ?>">

                <?php
                echo $message;
                ?>

            </p>

<?php

}

?>


        </div>


    </div>


</div>


</form>


<?php

}
else
{

?>


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


<?php

}

?>


</section>


<script src="../JS/cart.js"></script>


<?php

include "../../Layouts/footer.php";

?>
