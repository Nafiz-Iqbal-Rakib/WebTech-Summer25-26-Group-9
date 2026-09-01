<?php
include "../../../Controller/SessionCheck.php";
include "../../../Model/Database.php";

$database=new Database();
$connection=$database->connection();

$sql="SELECT * FROM orders
      WHERE buyer_id=".$_SESSION["user_id"]."
      ORDER BY id DESC";

$result=$connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en-US">

    <head>
        <title>MiniMart - My Orders</title>
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
            </div>

        </div>


        <div class="container">

            <div class="pageTitle">

                <p class="smallText">
                    <?php echo $_SESSION["first_name"]; ?>
                </p>

                <h1>My Orders</h1>

            </div>


            <?php

            if($result && $result->num_rows>0)
            {
                while($order=$result->fetch_assoc())
                {
            ?>

                    <div class="orderBox">

                        <div class="orderLeft">

                            <p class="smallText">
                                #ORD-<?php echo $order["id"]; ?>
                                -
                                <?php echo $order["created_at"]; ?>
                            </p>

                            <h3>
                                <?php echo $order["address"]; ?>
                            </h3>

                        </div>


                        <div class="orderRight">

                            <h3>
                                ৳<?php echo $order["total_price"]; ?>
                            </h3>

                            <p>
                                <?php echo $order["status"]; ?>
                            </p>

                        </div>

                    </div>

            <?php
                }
            }
            else
            {
                echo "<p>No Orders Found</p>";
            }

            ?>

        </div>


        <div class="footer">
            © Arabi 2026 | All rights reserved
        </div>

    </body>
</html>
