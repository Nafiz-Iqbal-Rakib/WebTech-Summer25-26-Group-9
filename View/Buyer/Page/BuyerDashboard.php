<?php
include "../../../Controller/SessionCheck.php";
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>MiniMart - Buyer Dashboard</title>
        <link rel="stylesheet" href="../Design/Style.css">
    </head>

    <body>

        <div class="saleBar">
            New Year sale | 44% Off - Free delivery above ৳5000
        </div>

        <div class="header">

            <div class="logo">Arabi</div>

            <div class="nav">
                <a href="BuyerDashboard.php">Shop</a>
                <a href="MyOrders.php">My Orders</a>
                <a href="EditProfile.php">Profile</a>
                <a href="Cart.php">Cart</a>
                <a href="Logout.php">Logout</a>
            </div>

        </div>


        <div class="container">

            <div class="pageTitle">

                <p class="smallText">
                    WELCOME <?php echo $_SESSION["first_name"]; ?>
                </p>

                <h1>Buyer Dashboard</h1>

            </div>


            <h2>Available Products</h2>


            <div class="productBox">

                <div class="productImage">
                    Product Image
                </div>

                <h3>Rattan Pendant Light</h3>

                <p class="smallText">
                    Simple hanging light for home decoration.
                </p>

                <p><b>৳5,400</b></p>

                <br>

                <a href="Cart.php">ORDER</a>

            </div>


            <div class="productBox">

                <div class="productImage">
                    Product Image
                </div>

                <h3>Linen Throw Pillow Set</h3>

                <p class="smallText">
                    Soft pillow set for living room furniture.
                </p>

                <p><b>৳3,600</b></p>

                <br>

                <a href="Cart.php">ORDER</a>

            </div>


            <div class="productBox">

                <div class="productImage">
                    Product Image
                </div>

                <h3>Oslo Lounge Chair</h3>

                <p class="smallText">
                    Comfortable lounge chair for home use.
                </p>

                <p><b>৳12,500</b></p>

                <br>

                <a href="Cart.php">ORDER</a>

            </div>


            <div class="clear"></div>

        </div>


        <div class="footer">
            © Arabi 2026 | All rights reserved
        </div>

    </body>
</html>
