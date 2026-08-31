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
}


/*
|--------------------------------------------------------------------------
| AJAX DELETE REQUEST
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["delete_user"]) && isset($_POST["user_id"])) {

        $id = intval($_POST["user_id"]);

        $controller = new UserController();

        $result = $controller->deleteUser($id);

        header("Content-Type: application/json");

        if ($result) {

            echo json_encode([
                "success" => true,
                "message" => "User deleted successfully."
            ]);

        } else {

            echo json_encode([
                "success" => false,
                "message" => "Failed to delete user."
            ]);
        }

        exit;
    }
}

?>