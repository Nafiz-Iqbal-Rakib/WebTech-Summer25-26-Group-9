<?php

$email="";
$password="";
$message="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email=trim($_POST["email"] ?? "");
    $password=trim($_POST["password"] ?? "");

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
        $message="Login Data is Valid";
    }
}

?>
