<?php

require_once __DIR__ . "/../Model/CommonModel.php";

class SidebarController
{
    protected $model;


    public function __construct()
    {
        $this->model = new CommonModel();
    }


    public function getAdminData()
    {
        if (!isset($_SESSION["email"])) {

            header(
                "Location: /WebTech-Summer25-26-Group-9/View/Common/Pages/loginPage.php"
            );

            exit;
        }


        $email = $_SESSION["email"];


        // Get user result

        $result = $this->model->getUserByEmail($email);


        // Convert mysqli_result into array

        $user = $result->fetch_assoc();


        $adminName =
            $user["first_name"] . " " .
            $user["last_name"];


        $adminRole =
            strtoupper($user["role"]);


        $adminEmail =
            $user["email"];


        $adminInitial =
            strtoupper(substr($user["first_name"], 0, 1));


        return compact(
            "adminName",
            "adminRole",
            "adminEmail",
            "adminInitial"
        );
    }
}