<?php

require_once "../Model/CommonModel.php";

class AuthController
{
    public function login()
    {
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";

        $model = new CommonModel();

        $result = $model->getUserByEmail($email);

        if ($result->num_rows === 0) {

            return [
                "success" => false,
                "message" => "Invalid email or password."
            ];
        }


        $user = $result->fetch_row();


        // Check password

        if (!password_verify($password, $user[3])) {

            return [
                "success" => false,
                "message" => "Invalid email or password."
            ];
        }


        // Check user status

        $status = $user[6];


        if ($status === "suspended") {

            return [
                "success" => false,
                "message" => "Your account has been suspended."
            ];
        }


        if ($status === "deactivated") {

            return [
                "success" => false,
                "message" => "Your account has been deactivated."
            ];
        }


        // Login successful

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


        $_SESSION["user_id"] = $user[0];
        $_SESSION["email"] = $user[1];
        $_SESSION["role"] = $user[2];


        return [
            "success" => true,
            "message" => "Login successful.",
            "role" => $user[2]
        ];
    }


    // =========================
    // REGISTER
    // =========================

    public function register()
    {
        $firstName = trim($_POST["firstName"] ?? "");
        $lastName = trim($_POST["lastName"] ?? "");
        $role = $_POST["role"] ?? "";
        $email = trim($_POST["email"] ?? "");
        $phone = trim($_POST["phone"] ?? "");
        $password = $_POST["password"] ?? "";
        $confirmPassword = $_POST["confirmPassword"] ?? "";


        if (
            $firstName === "" ||
            $lastName === "" ||
            $role === "" ||
            $email === "" ||
            $phone === "" ||
            $password === "" ||
            $confirmPassword === ""
        ) {

            return [
                "success" => false,
                "message" => "All fields are required."
            ];
        }


        if ($password !== $confirmPassword) {

            return [
                "success" => false,
                "message" => "Passwords do not match."
            ];
        }


        $model = new CommonModel();

        $result = $model->getUserByEmail($email);


        if ($result->num_rows > 0) {

            return [
                "success" => false,
                "message" => "Email already exists."
            ];
        }


        $password = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        $success = $model->registerUser(
            $firstName,
            $lastName,
            $role,
            $email,
            $phone,
            $password
        );


        if ($success) {

            return [
                "success" => true,
                "message" => "Registration successful."
            ];
        }


        return [
            "success" => false,
            "message" => "Registration failed."
        ];
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $controller = new AuthController();


    if ($_GET["action"] === "login") {

        $response = $controller->login();
    }
    elseif ($_GET["action"] === "register") {

        $response = $controller->register();
    }


    header("Content-Type: application/json");

    echo json_encode($response);

    exit;
}

?>