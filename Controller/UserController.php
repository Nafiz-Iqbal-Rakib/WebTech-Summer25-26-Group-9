<?php

require_once __DIR__ . "/../Model/AdminModel.php";

class UserController
{
    protected $model;


    public function __construct()
    {
        $this->model = new AdminModel();
    }


    // Get Users

    public function getUsers()
    {
        $result = $this->model->getAllUsers();

        $users = [];


        while ($row = $result->fetch_assoc()) {

            $users[] = [

                "id" =>
                    $row["id"],

                "name" =>
                    $row["first_name"] . " " .
                    $row["last_name"],

                "email" =>
                    $row["email"],

                "role" =>
                    strtoupper($row["role"]),

                "orders" =>
                    $row["total_orders"],

                "status" =>
                    $row["status"]
            ];
        }


        return $users;
    }


    // Delete User

    public function deleteUser($id)
    {
        return $this->model->deleteUser($id);
    }

    public function updateUserStatus($id, $status)
    {
        return $this->model->updateUserStatus($id, $status);
    }
}


/*
|--------------------------------------------------------------------------
| AJAX DELETE REQUEST
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $controller = new UserController();


    // DELETE USER

    if (isset($_POST["delete_user"])) {

        $userId = $_POST["user_id"];

        $success = $controller->deleteUser($userId);

        header("Content-Type: application/json");

        echo json_encode([
            "success" => $success,
            "message" => $success
                ? "User deleted successfully."
                : "Failed to delete user."
        ]);

        exit;
    }


    // UPDATE USER STATUS

    if (isset($_POST["update_status"])) {

        $userId = $_POST["user_id"];
        $status = $_POST["status"];

        $success = $controller->updateUserStatus(
            $userId,
            $status
        );

        header("Content-Type: application/json");

        echo json_encode([
            "success" => $success,
            "message" => $success
                ? "User status updated successfully."
                : "Failed to update user status."
        ]);

        exit;
    }
}

?>