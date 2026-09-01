<?php

if(session_status()==PHP_SESSION_NONE)
{
    session_start();
}

$email="";
$password="";
$message="";
$remember="";

if(isset($_COOKIE["buyer_email"]))
{
    $email=$_COOKIE["buyer_email"];
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email=trim($_POST["email"] ?? "");
    $password=trim($_POST["password"] ?? "");

    if(isset($_POST["remember"]))
    {
        $remember="checked";
    }

    $valid=true;

    if(empty($email) || strlen($email)<5)
    {
        $message="E-mail Must be at least 5 Char";
        $valid=false;
    }

    if(empty($password) || strlen($password)<5)
    {
        $message="Password Must be at least 5 Char";
        $valid=false;
    }

    if($valid)
    {
        $database=new Database();
        $connection=$database->connection();

        $sql="SELECT * FROM users
              WHERE email='".$email."'
              AND password='".$password."'
              AND role='buyer'";

        $result=$connection->query($sql);

        if($result && $result->num_rows==1)
        {
            $user=$result->fetch_assoc();

            $_SESSION["user_id"]=$user["id"];
            $_SESSION["email"]=$user["email"];
            $_SESSION["role"]=$user["role"];
            $_SESSION["first_name"]=$user["first_name"];

            if(isset($_POST["remember"]))
            {
                setcookie(
                    "buyer_email",
                    $email,
                    time()+86400*7,
                    "/"
                );
            }

            header("Location: BuyerDashboard.php");
            exit;
        }
        else
        {
            $message="Invalid E-mail or Password";
        }
    }
}

?>
