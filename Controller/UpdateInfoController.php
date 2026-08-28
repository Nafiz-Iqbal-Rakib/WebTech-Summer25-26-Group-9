<?php

class UpdateInfoController
{
    public function updatePersonalInfo()
    {
        $fullName = trim($_POST["full_name"] ?? "");
        $phone = trim($_POST["phone"] ?? "");


        // Validate Full Name

        if ($fullName === "") {

            return [
                "success" => false,
                "message" => "Full name is required"
            ];
        }


        // Validate Phone

        if ($phone === "") {

            return [
                "success" => false,
                "message" => "Phone number is required"
            ];
        }


        if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $phone)) {

            return [
                "success" => false,
                "message" => "Please enter a valid phone number"
            ];
        }


        // Database Update
        
        // DB code will be added here


        return [
            "success" => true,
            "message" => "Personal information updated successfully"
        ];
    }


    public function updatePassword()
    {
        $currentPassword = $_POST["current_password"] ?? "";
        $newPassword = $_POST["new_password"] ?? "";
        $confirmPassword = $_POST["confirm_password"] ?? "";


        // Validate Current Password

        if (trim($currentPassword) === "") {

            return [
                "success" => false,
                "message" => "Current password is required"
            ];
        }


        // Validate New Password

        if (trim($newPassword) === "") {

            return [
                "success" => false,
                "message" => "New password is required"
            ];
        }


        // Validate Confirm Password

        if (trim($confirmPassword) === "") {

            return [
                "success" => false,
                "message" => "Please confirm your new password"
            ];
        }


        // Check Password Match

        if ($newPassword !== $confirmPassword) {

            return [
                "success" => false,
                "message" => "Passwords do not match"
            ];
        }


        // Database Update
        // DB code will be added here


        return [
            "success" => true,
            "message" => "Password updated successfully"
        ];
    }


    public function updateDeliveryAddress()
    {
        $streetAddress = trim($_POST["street_address"] ?? "");
        $areaCity = trim($_POST["area_city"] ?? "");


        // Validate Street Address

        if ($streetAddress === "") {

            return [
                "success" => false,
                "message" => "Street address is required"
            ];
        }


        // Validate Area / City

        if ($areaCity === "") {

            return [
                "success" => false,
                "message" => "Area / City is required"
            ];
        }


        // Database Update
        // DB code will be added here


        return [
            "success" => true,
            "message" => "Delivery address updated successfully"
        ];
    }


    public function deleteAccount()
    {
        $confirmation =
            trim($_POST["delete_confirmation"] ?? "");


        // Validate Confirmation

        if ($confirmation === "") {

            return [
                "success" => false,
                "message" => "Please type DELETE to confirm"
            ];
        }


        if ($confirmation !== "DELETE") {

            return [
                "success" => false,
                "message" => "Please type DELETE exactly"
            ];
        }


        // Database Delete
        // DB code will be added here


        return [
            "success" => true,
            "message" => "Account deleted successfully"
        ];
    }
}


// Handle Request

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $controller = new UpdateInfoController();

    $action = $_POST["action"] ?? "";

    switch ($action) {

        case "update_personal_info":

            $response =
                $controller->updatePersonalInfo();

            break;


        case "update_password":

            $response =
                $controller->updatePassword();

            break;


        case "update_delivery_address":

            $response =
                $controller->updateDeliveryAddress();

            break;


        case "delete_account":

            $response =
                $controller->deleteAccount();

            break;


        default:

            $response = [
                "success" => false,
                "message" => "Invalid request"
            ];

            break;
    }


    header("Content-Type: application/json");

    echo json_encode($response);

    exit;
}
