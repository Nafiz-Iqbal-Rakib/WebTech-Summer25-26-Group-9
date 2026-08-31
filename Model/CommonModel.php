<?php
require_once "Database.php";
class CommonModel
{
    protected $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection();
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT id, email, role, password
                FROM users
                WHERE email = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("s", $email);

        $stmt->execute();

        return $stmt->get_result();
    }

    public function registerUser($firstName, $lastName, $role, $email, $phone, $password)
    {
        $sql = "INSERT INTO users
                (first_name, last_name, role, email, phone, password)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param(
            "ssssss",
            $firstName,
            $lastName,
            $role,
            $email,
            $phone,
            $password
        );

        return $stmt->execute();
    }
}

?>