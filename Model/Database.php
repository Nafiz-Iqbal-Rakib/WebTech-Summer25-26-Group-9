<?php

class Database
{
    public function connection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "ecommerce_db";

        $connection = new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_name
        );

        if ($connection->connect_error) {
            die("Database connection failed: " . $connection->connect_error);
        }

        return $connection;
    }
}

?>