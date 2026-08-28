<?php

class SidebarController
{
    public function getAdminData()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["email"])) {
            header("Location: /WebTech-Summer25-26-Group-9/View/Common/Pages/loginPage.php");
            exit;
        }

        $adminName = "Nafiz Iqbal";
        $adminRole = "ADMIN";
        $adminEmail = $_SESSION["email"];
        $adminInitial = strtoupper(substr($adminName, 0, 1));

        return compact(
            "adminName",
            "adminRole",
            "adminEmail",
            "adminInitial"
        );
    }
}