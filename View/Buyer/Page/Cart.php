<?php
include "../../../Controller/OrderValidation.php";
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>MiniMart - Shopping Cart</title>
        <link rel="stylesheet" href="../Design/Style.css">
        <script src="../../../JS/CheckCoupon.js"></script>

        <script>
            function collect_data()
            {
                let city=document.getElementById("city").value.trim();
                let zip=document.getElementById("zip").value.trim();
                let quantity1=document.getElementById("quantity1").value.trim();
                let quantity2=document.getElementById("quantity2").value.trim();
                let quantity3=document.getElementById("quantity3").value.trim();
                let valid=true;
                let message="";

                if(city.length<3)
                {
                    message+="City Must be at least 3 Char\n";
                    valid=false;
                }

                if(zip.length<4)
                {
                    message+="Zip Code Must be at least 4 Char\n";
                    valid=false;
                }

                if(quantity1<1 || quantity2<1 || quantity3<1)
                {
                    message+="Quantity Must be at least 1";
                    valid=false;
                }

                if(!valid)
                {
                    alert(message);
                }

                return valid;
            }
        </script>
    </head>

    <body>
        <div class="saleBar">New Year sale | 44% Off</div>

        <div class="header">
            <div class="logo">Arabi</div>
            <div class="nav">
                <a href="BuyerDashboard.php">Home</a>
                <a href="BuyerDashboard.php">Shop</a>
                <a href="MyOrders.php">My Orders</a>
                <a href="EditProfile.html">Profile</a>
            </div>
        </div>

        <div class="banner">
            <h1>Your Shopping Cart</h1>
            <p class="smallText">Home / Cart</p>
        </div>

        <form method="post" action="" onsubmit="return collect_data()">

            <div class="container cartLayout">

                <div class="cartMain">

                    <table class="cartTable">
                        <tr>
                            <td>Products</td>
                            <td>Unit Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>

                        <tr>
                            <td>Winter Jacket for Man</td>
                            <td>৳2,000</td>
                            <td>
                                <input type="number" id="quantity1" name="quantity1" value="<?php echo $quantity1; ?>" min="1">
                            </td>
                            <td>৳2,000</td>
                        </tr>

                        <tr>
                            <td>Gray Winter Full Sleeve Shirt</td>
                            <td>৳2,000</td>
                            <td>
                                <input type="number" id="quantity2" name="quantity2" value="<?php echo $quantity2; ?>" min="1">
                            </td>
                            <td>৳2,000</td>
                        </tr>

                        <tr>
                            <td>Winter Jacket for Women</td>
                            <td>৳1,000</td>
                            <td>
                                <input type="number" id="quantity3" name="quantity3" value="<?php echo $quantity3; ?>" min="1">
                            </td>
                            <td>৳1,000</td>
                        </tr>
                    </table>

                    <br>

                    <label for="note">Add a note:</label>
                    <textarea id="note" name="note" rows="4"><?php echo $note; ?></textarea>

                    <br><br>

                    <a class="formLink" href="BuyerDashboard.php">Back To Shopping</a>

                </div>


                <div class="cartSide">

                    <div class="sideBox">
                        <h3>Shipping Address</h3>

                        <label for="country">Country:</label>
                        <select id="country" name="country">
                            <option>Bangladesh</option>
                        </select>

                        <br><br>

                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" value="<?php echo $city; ?>">

                        <br><br>

                        <label for="zip">Zip Code:</label>
                        <input type="text" id="zip" name="zip" value="<?php echo $zip; ?>">
                    </div>


                    <div class="sideBox">
                        <h3>Coupon</h3>

                        <input type="text" id="coupon" name="coupon" placeholder="Coupon Code" onkeyup="CheckCoupon()">

                        <span id="couponresponse"></span>

                        <br><br>

                        <input type="submit" name="couponbutton" value="APPLY COUPON">
                    </div>


                    <div class="sideBox">

                        <p>Order Summary</p>

                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>৳5,000</td>
                            </tr>

                            <tr>
                                <td>Shipping</td>
                                <td>+৳100</td>
                            </tr>

                            <tr>
                                <td>Discount</td>
                                <td>-৳100</td>
                            </tr>

                            <tr>
                                <td>Total</td>
                                <td>৳5,000</td>
                            </tr>
                        </table>

                        <input type="submit" name="checkout" value="CHECKOUT NOW">

                        <p class="smallText"><?php echo $message; ?></p>

                    </div>

                </div>

            </div>

        </form>

        <div class="footer">© Arabi 2026 | All rights reserved</div>
    </body>
</html>
