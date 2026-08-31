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

                "id" => $row["id"],

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
}

?>