<?php

include "../../../Controller/BuyerController.php";


$buyerController =
    new BuyerController();


$orders =
    $buyerController->getOrders();


include "../../Layouts/header.php";

?>


<link
    rel="stylesheet"
    href="../Designs/myOrders.css"
>


<section class="buyer-orders-page">


    <div class="buyer-orders-title">

        <p>
            MY ACCOUNT
        </p>

        <h1>
            My Orders
        </h1>

    </div>


<?php

if($orders && $orders->num_rows > 0)
{

    while(
        $order =
        $orders->fetch_assoc()
    )
    {

?>


    <div class="buyer-order-box">


        <div class="order-location">

            <p class="order-label">
                LOCATION
            </p>

            <h3>
                <?php
                echo $order["address"];
                ?>
            </h3>

        </div>


        <div class="order-status">

            <p class="order-label">
                STATUS
            </p>

            <h3>
                <?php
                echo $order["status"];
                ?>
            </h3>

        </div>


    </div>


<?php

    }

}
else
{

?>


    <div class="buyer-order-box">

        <p>
            No orders found.
        </p>

    </div>


<?php

}

?>


</section>


<?php

include "../../Layouts/footer.php";

?>
