<?php

$profile_message="";
$password_message="";
$delete_message="";

$database=new Database();
$connection=$database->connection();

$sql="SELECT * FROM users WHERE id=".$_SESSION["user_id"];
$result=$connection->query($sql);

$user=$result->fetch_assoc();

$first_name=$user["first_name"];
$last_name=$user["last_name"];
$phone=$user["phone"];

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["save_profile"]))
    {
        $first_name=trim($_POST["first_name"] ?? "");
        $last_name=trim($_POST["last_name"] ?? "");
        $phone=trim($_POST["phone"] ?? "");

        $valid=true;

        if(empty($first_name) || strlen($first_name)<2)
        {
            $profile_message="First Name Must be at least 2 Char";
            $valid=false;
        }

        if(empty($last_name) || strlen($last_name)<2)
        {
            $profile_message="Last Name Must be at least 2 Char";
            $valid=false;
        }

        if(empty($phone) || strlen($phone)<7)
        {
            $profile_message="Phone Number Must be at least 7 Char";
            $valid=false;
        }

        if($valid)
        {
            $sql="UPDATE users
                  SET first_name='".$first_name."',
                      last_name='".$last_name."',
                      phone='".$phone."'
                  WHERE id=".$_SESSION["user_id"];

            if($connection->query($sql))
            {
                $_SESSION["first_name"]=$first_name;
                $profile_message="Profile Updated Successfully";
            }
        }
    }


    if(isset($_POST["change_password"]))
    {
        $current_password=trim($_POST["current_password"] ?? "");
        $new_password=trim($_POST["new_password"] ?? "");
        $confirm_password=trim($_POST["confirm_password"] ?? "");

        $valid=true;

        if(empty($current_password) || strlen($current_password)<5)
        {
            $password_message="Current Password Must be at least 5 Char";
            $valid=false;
        }

        if(empty($new_password) || strlen($new_password)<5)
        {
            $password_message="New Password Must be at least 5 Char";
            $valid=false;
        }

        if($new_password!=$confirm_password)
        {
            $password_message="New Password and Confirm Password Must Match";
            $valid=false;
        }

        if($current_password!=$user["password"])
        {
            $password_message="Current Password is Wrong";
            $valid=false;
        }

        if($valid)
        {
            $sql="UPDATE users
                  SET password='".$new_password."'
                  WHERE id=".$_SESSION["user_id"];

            if($connection->query($sql))
            {
                $password_message="Password Updated Successfully";
            }
        }
    }


    if(isset($_POST["delete_account"]))
    {
        $delete_confirmation=trim($_POST["delete_confirmation"] ?? "");

        if($delete_confirmation=="DELETE")
        {
            $sql="DELETE FROM users WHERE id=".$_SESSION["user_id"];

            if($connection->query($sql))
            {
                session_destroy();

                header("Location: Login.php");
                exit;
            }
        }
        else
        {
            $delete_message="Type DELETE to Confirm";
        }
    }
}

?>
