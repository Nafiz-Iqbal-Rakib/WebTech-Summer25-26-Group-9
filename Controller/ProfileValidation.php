<?php

$first_name="Sadika";
$last_name="Rahman";
$phone="+880 17XX-XXXXXX";

$profile_message="";
$password_message="";
$delete_message="";

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
            $profile_message="Profile Data is Valid";
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

        if($valid)
        {
            $password_message="Password Data is Valid";
        }
    }


    if(isset($_POST["delete_account"]))
    {
        $delete_confirmation=trim($_POST["delete_confirmation"] ?? "");

        if($delete_confirmation=="DELETE")
        {
            $delete_message="Delete Confirmation is Valid";
        }
        else
        {
            $delete_message="Type DELETE to Confirm";
        }
    }
}

?>
