<?php

$coupon=trim($_POST["coupon"] ?? "");

if($coupon=="")
{
    echo "Coupon Required";
}
else
{
    if($coupon=="MINI10")
    {
        echo "Coupon Accepted";
    }
    else
    {
        echo "Invalid Coupon";
    }
}

?>
