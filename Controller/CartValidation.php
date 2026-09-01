<?php

$quantity1="1";
$quantity2="1";
$quantity3="1";
$city="Dhaka";
$zip="1205";
$note="";
$message="";

if(isset($_COOKIE["buyer_city"]))
{
    $city=$_COOKIE["buyer_city"];
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["checkout"]))
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
        $total=($quantity1*2000)+($quantity2*2000)+($quantity3*1000);
        $address=$city." ".$zip;

        $database=new Database();
        $connection=$database->connection();

        $sql="INSERT INTO orders
              (buyer_id, total_price, address, status)
              VALUES
              (".$_SESSION["user_id"].", ".$total.", '".$address."', 'PENDING')";

        $result=$connection->query($sql);

        if($result)
        {
            $_SESSION["last_order_status"]="PENDING";

            setcookie(
                "buyer_city",
                $city,
                time()+86400*30,
                "/"
            );

            $jsonFile="../../../Model/order.json";

            $orders=[];

            if(file_exists($jsonFile))
            {
                $jsonData=file_get_contents($jsonFile);
                $orders=json_decode($jsonData, true);

                if(!is_array($orders))
                {
                    $orders=[];
                }
            }

            $orders[]=[
                "buyer_id"=>$_SESSION["user_id"],
                "city"=>$city,
                "zip"=>$zip,
                "total"=>$total,
                "status"=>"PENDING"
            ];

            file_put_contents(
                $jsonFile,
                json_encode($orders, JSON_PRETTY_PRINT)
            );

            $message="Order Placed Successfully";
        }
        else
        {
            $message="Order Could Not Be Placed";
        }
    }
}

?>
