<?php

class ForgotPasswordController
{
    public function changePassword()
    {
        $email = trim($_POST["email"] ?? "");
        $newPassword = $_POST["new_password"] ?? "";
        $confirmPassword = $_POST["confirm_password"] ?? "";


        // Validate Email

        if ($email === "") {

            return [
                "success" => false,
                "message" => "Email is required"
            ];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return [
                "success" => false,
                "message" => "Please enter a valid email address"
            ];
        }


        // Validate New Password

        if (trim($newPassword) === "") {

            return [
                "success" => false,
                "message" => "Password is required"
            ];
        }


        // Validate Confirm Password

        if (trim($confirmPassword) === "") {

            return [
                "success" => false,
                "message" => "Please confirm your password"
            ];
        }


        // Check Password Match

        if ($newPassword !== $confirmPassword) {

            return [
                "success" => false,
                "message" => "Passwords do not match"
            ];
        }


        // Database Call

        // DB code will be added here later


        return [
            "success" => true,
            "message" => "Password changed successfully"
        ];
    }
}


// Handle Request

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $controller = new ForgotPasswordController();

    $response = $controller->changePassword();

    header("Content-Type: application/json");

    echo json_encode($response);

    exit;
}