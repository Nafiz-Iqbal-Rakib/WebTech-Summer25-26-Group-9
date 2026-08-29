<?php

class db{
    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="minimart";

        $connection=new mysqli($db_host, $db_user, $db_password, $db_name);

        if($connection->connect_error)
            {
                die("Please Connect the Database");
            }

        return $connection;
    }
}

?>
