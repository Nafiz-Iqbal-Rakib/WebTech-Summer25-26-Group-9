<?php
include "../../../Model/db.php";
session_start();

$city="Dhaka";
$zip="1205";
$quantity1="1";
$quantity2="1";
$quantity3="1";
$note="";
$message="";
$valid=true;

if(isset($_COOKIE["buyer_city"]))
    {
        $city=$_COOKIE["buyer_city"];
    }

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["checkout"]))
    {
        $city=trim($_POST["city"] ?? "");
        $zip=trim($_POST["zip"] ?? "");
        $quantity1=trim($_POST["quantity1"] ?? "");
        $quantity2=trim($_POST["quantity2"] ?? "");
        $quantity3=trim($_POST["quantity3"] ?? "");
        $note=trim($_POST["note"] ?? "");

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

        if($quantity1<1 || $quantity2<1 || $quantity3<1)
            {
                $message="Quantity Must be at least 1";
                $valid=false;
            }

        if($valid)
            {
                $username="Buyer";

                if(isset($_SESSION["username"]))
                    {
                        $username=$_SESSION["username"];
                    }

                $_SESSION["last_order"]="PENDING";

                setcookie("buyer_city", $city, time()+86400*30, "/");

                $total=($quantity1*2000)+($quantity2*2000)+($quantity3*1000);

                $jsonfile="../../../Model/order.json";
                $orders=[];

                if(file_exists($jsonfile))
                    {
                        $jsonData=file_get_contents($jsonfile);
                        $orders=json_decode($jsonData, true) ?? [];

                        $orders[]=[
                            'username'=>$username,
                            'city'=>$city,
                            'zip'=>$zip,
                            'total'=>$total,
                            'status'=>'PENDING',
                            'timestamp'=>time()
                        ];

                        file_put_contents($jsonfile, json_encode($orders, JSON_PRETTY_PRINT));
                    }

                $database=new db();
                $connection=$database->connection();

                $sql="INSERT INTO buyer_orders(username, city, zip_code, total, status) 
                VALUES ('".$username."', '".$city."', '".$zip."', '".$total."', 'PENDING')";

                $result=$connection->query($sql);

                if($result)
                    {
                        $message="Order Placed Successfully";
                    }
                else
                    {
                        $message="Please try again";
                    }
            }
    }
?>
