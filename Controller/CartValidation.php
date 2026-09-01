<?php

$quantity1="1";
$quantity2="1";
$quantity3="1";
$city="Dhaka";
$zip="1205";
$note="";
$message="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $quantity1=trim($_POST["quantity1"] ?? "");
    $quantity2=trim($_POST["quantity2"] ?? "");
    $quantity3=trim($_POST["quantity3"] ?? "");
    $city=trim($_POST["city"] ?? "");
    $zip=trim($_POST["zip"] ?? "");
    $note=trim($_POST["note"] ?? "");

    $valid=true;

    if($quantity1<1 || $quantity2<1 || $quantity3<1)
    {
        $message="Quantity Must be at least 1";
        $valid=false;
    }

    if(empty($city) || strlen($city)<3)
    {
        $message="City Must be at least 3 Char";
        $valid=false;
    }

    if(empty($zip) || strlen($zip)<4)
    {
        $message="Zip Code Must be at least 4 Char";
        $valid=false;
    }

    if($valid)
    {
        $message="Cart Data is Valid";
    }
}

?>
