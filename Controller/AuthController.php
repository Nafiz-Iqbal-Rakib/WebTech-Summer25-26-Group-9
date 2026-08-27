<?php

class AuthController
{
    public function handleLogin()
    {
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";

        if ($email === "nafiziqbal@gmail.com" && $password === "4545") {

            return [
                "success" => true,
                "message" => "Login successful.",
                "role" => "admin"
            ];

        }

        return [
            "success" => false,
            "message" => "Invalid email or password."
        ];
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $controller = new AuthController();

    $response = $controller->handleLogin();

    header("Content-Type: application/json");

    echo json_encode($response);

    exit;
}