<?php

session_start();

require_once __DIR__ . "/../Model/CommonModel.php";


class UpdateInfoController
{

    // ============================================================
    // GET PERSONAL INFORMATION
    // ============================================================

    public function getPersonalInfo()
    {

        if (!isset($_SESSION["user_id"])) {

            return [
                "success" => false,
                "message" => "User is not logged in"
            ];
        }


        $userId =
            $_SESSION["user_id"];


        $model =
            new CommonModel();


        $result =
            $model->getUserById($userId);


        if (!$result) {

            return [
                "success" => false,
                "message" => "Database error"
            ];
        }


        if ($result->num_rows === 0) {

            return [
                "success" => false,
                "message" => "User information not found"
            ];
        }


        $user =
            $result->fetch_assoc();


        return [
            "success" => true,
            "user" => $user
        ];
    }



    // ============================================================
    // UPDATE PERSONAL INFORMATION
    // ============================================================

    public function updatePersonalInfo()
    {

        if (!isset($_SESSION["user_id"])) {

            return [
                "success" => false,
                "message" => "User is not logged in"
            ];
        }


        $userId =
            $_SESSION["user_id"];


        $firstName =
            trim($_POST["first_name"] ?? "");


        $lastName =
            trim($_POST["last_name"] ?? "");


        $phone =
            trim($_POST["phone"] ?? "");



        // ========================================================
        // VALIDATION
        // ========================================================

        if ($firstName === "") {

            return [
                "success" => false,
                "message" => "First name is required"
            ];
        }


        if ($lastName === "") {

            return [
                "success" => false,
                "message" => "Last name is required"
            ];
        }


        if ($phone === "") {

            return [
                "success" => false,
                "message" => "Phone number is required"
            ];
        }


        if (
            !preg_match(
                '/^[0-9+\-\s()]{7,20}$/',
                $phone
            )
        ) {

            return [
                "success" => false,
                "message" => "Please enter a valid phone number"
            ];
        }



        // ========================================================
        // UPDATE DATABASE
        // ========================================================

        $model =
            new CommonModel();


        $result =
            $model->updatePersonalInfo(
                $userId,
                $firstName,
                $lastName,
                $phone
            );


        if (!$result) {

            return [
                "success" => false,
                "message" =>
                    "Failed to update personal information"
            ];
        }


        return [
            "success" => true,
            "message" =>
                "Personal information updated successfully"
        ];
    }



    // ============================================================
    // UPDATE PASSWORD
    // ============================================================

    public function updatePassword()
    {

        if (!isset($_SESSION["user_id"])) {

            return [
                "success" => false,
                "message" => "User is not logged in"
            ];
        }


        $userId =
            $_SESSION["user_id"];


        $currentPassword =
            $_POST["current_password"] ?? "";


        $newPassword =
            $_POST["new_password"] ?? "";


        $confirmPassword =
            $_POST["confirm_password"] ?? "";



        // ========================================================
        // VALIDATION
        // ========================================================

        if (
            trim($currentPassword) === ""
        ) {

            return [
                "success" => false,
                "message" =>
                    "Current password is required"
            ];
        }


        if (
            trim($newPassword) === ""
        ) {

            return [
                "success" => false,
                "message" =>
                    "New password is required"
            ];
        }


        if (
            trim($confirmPassword) === ""
        ) {

            return [
                "success" => false,
                "message" =>
                    "Please confirm your new password"
            ];
        }


        if (
            $newPassword !==
            $confirmPassword
        ) {

            return [
                "success" => false,
                "message" =>
                    "Passwords do not match"
            ];
        }



        // ========================================================
        // GET CURRENT USER
        // ========================================================

        $model =
            new CommonModel();


        $result =
            $model->getUserById($userId);


        if (!$result) {

            return [
                "success" => false,
                "message" => "Database error"
            ];
        }


        if ($result->num_rows === 0) {

            return [
                "success" => false,
                "message" => "User not found"
            ];
        }


        $user =
            $result->fetch_assoc();


        $storedPassword =
            $user["password"];



        // ========================================================
        // CHECK CURRENT PASSWORD
        // ========================================================

        $passwordCorrect = false;


        // Check hashed password

        if (
            password_verify(
                $currentPassword,
                $storedPassword
            )
        ) {

            $passwordCorrect = true;
        }


        // Check old plain-text password

        elseif (
            $currentPassword ===
            $storedPassword
        ) {

            $passwordCorrect = true;
        }



        if (!$passwordCorrect) {

            return [
                "success" => false,
                "message" =>
                    "Current password is incorrect"
            ];
        }



        // ========================================================
        // HASH NEW PASSWORD
        // ========================================================

        $hashedPassword =
            password_hash(
                $newPassword,
                PASSWORD_DEFAULT
            );



        // ========================================================
        // UPDATE PASSWORD
        // ========================================================

        $result =
            $model->updatePassword(
                $userId,
                $hashedPassword
            );


        if (!$result) {

            return [
                "success" => false,
                "message" =>
                    "Failed to update password"
            ];
        }


        return [
            "success" => true,
            "message" =>
                "Password updated successfully"
        ];
    }



    // ============================================================
    // DELETE ACCOUNT
    // ============================================================

    public function deleteAccount()
    {

        if (!isset($_SESSION["user_id"])) {

            return [
                "success" => false,
                "message" => "User is not logged in"
            ];
        }


        $userId =
            $_SESSION["user_id"];


        $confirmation =
            trim(
                $_POST["delete_confirmation"] ?? ""
            );



        // ========================================================
        // VALIDATE DELETE CONFIRMATION
        // ========================================================

        if ($confirmation === "") {

            return [
                "success" => false,
                "message" =>
                    "Please type DELETE to confirm"
            ];
        }


        if ($confirmation !== "DELETE") {

            return [
                "success" => false,
                "message" =>
                    "Please type DELETE exactly"
            ];
        }



        // ========================================================
        // DELETE USER
        // ========================================================

        $model =
            new CommonModel();


        $result =
            $model->deleteUser($userId);


        if (!$result) {

            return [
                "success" => false,
                "message" =>
                    "Failed to delete account"
            ];
        }



        // ========================================================
        // DESTROY SESSION
        // ========================================================

        $_SESSION = [];


        if (
            ini_get("session.use_cookies")
        ) {

            $params =
                session_get_cookie_params();


            setcookie(
                session_name(),
                "",
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }


        session_destroy();



        // ========================================================
        // SUCCESS
        // ========================================================

        return [
            "success" => true,
            "message" =>
                "Account deleted successfully"
        ];
    }
}



// ============================================================
// CREATE CONTROLLER
// ============================================================

$controller =
    new UpdateInfoController();



// ============================================================
// REQUEST METHOD
// ============================================================

$requestMethod =
    $_SERVER["REQUEST_METHOD"] ?? "";



// ============================================================
// GET REQUEST
// ============================================================

if ($requestMethod === "GET") {

    $action =
        $_GET["action"] ?? "";



    switch ($action) {


        // ========================================================
        // EDIT PROFILE PAGE
        // ========================================================

        case "edit_profile":

            if (
                !isset($_SESSION["user_id"])
            ) {

                header(
                    "Location: /WebTech-Summer25-26-Group-9/View/Common/login.php"
                );

                exit;
            }


            $userId =
                $_SESSION["user_id"];


            $model =
                new CommonModel();


            $result =
                $model->getUserById($userId);


            if (
                !$result ||
                $result->num_rows === 0
            ) {

                die(
                    "User information not found"
                );
            }


            $user =
                $result->fetch_assoc();


            /*
             * IMPORTANT:
             * Change only this filename if your
             * actual edit profile file has another name.
             */

            require __DIR__ .
                "/../View/Common/Pages/updateInfoPage.php";

            exit;



        // ========================================================
        // GET PERSONAL INFORMATION AS JSON
        // ========================================================

        case "get_personal_info":

            $response =
                $controller->getPersonalInfo();


            header(
                "Content-Type: application/json; charset=UTF-8"
            );


            echo json_encode(
                $response
            );

            exit;



        // ========================================================
        // INVALID GET REQUEST
        // ========================================================

        default:

            header(
                "Content-Type: application/json; charset=UTF-8"
            );


            echo json_encode([
                "success" => false,
                "message" => "Invalid request"
            ]);

            exit;
    }
}



// ============================================================
// POST REQUEST
// ============================================================

if ($requestMethod === "POST") {

    $action =
        $_POST["action"] ?? "";



    switch ($action) {


        // ========================================================
        // UPDATE PERSONAL INFORMATION
        // ========================================================

        case "update_personal_info":

            $response =
                $controller->updatePersonalInfo();

            break;



        // ========================================================
        // UPDATE PASSWORD
        // ========================================================

        case "update_password":

            $response =
                $controller->updatePassword();

            break;



        // ========================================================
        // DELETE ACCOUNT
        // ========================================================

        case "delete_account":

            $response =
                $controller->deleteAccount();

            break;



        // ========================================================
        // INVALID POST REQUEST
        // ========================================================

        default:

            $response = [
                "success" => false,
                "message" => "Invalid request"
            ];

            break;
    }



    header(
        "Content-Type: application/json; charset=UTF-8"
    );


    echo json_encode(
        $response
    );

    exit;
}



// ============================================================
// INVALID REQUEST METHOD
// ============================================================

header(
    "Content-Type: application/json; charset=UTF-8"
);


echo json_encode([
    "success" => false,
    "message" => "Invalid request method"
]);

exit;

?>