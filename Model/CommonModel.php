
<?php

require_once __DIR__ . "/Database.php";


class CommonModel
{
    protected $connection;


    // ============================================================
    // DATABASE CONNECTION
    // ============================================================

    public function __construct()
    {
        $database = new Database();

        $this->connection = $database->connection();
    }



    // ============================================================
    // GET USER BY ID
    // ============================================================

    public function getUserById($userId)
    {
        $sql = "SELECT
                    id,
                    first_name,
                    last_name,
                    email,
                    phone,
                    role,
                    status,
                    password
                FROM users
                WHERE id = ?";


        $stmt = $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


        $stmt->bind_param(
            "i",
            $userId
        );


        if (!$stmt->execute()) {
            return false;
        }


        return $stmt->get_result();
    }



    // ============================================================
    // GET USER BY EMAIL
    // ============================================================

    public function getUserByEmail($email)
    {
        $sql = "SELECT
                    id,
                    email,
                    role,
                    password,
                    first_name,
                    last_name,
                    status
                FROM users
                WHERE email = ?";


        $stmt = $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


        $stmt->bind_param(
            "s",
            $email
        );


        if (!$stmt->execute()) {
            return false;
        }


        return $stmt->get_result();
    }



    // ============================================================
    // REGISTER USER
    // ============================================================

    public function registerUser(
        $firstName,
        $lastName,
        $role,
        $email,
        $phone,
        $password
    ) {

        $sql = "INSERT INTO users
                (
                    first_name,
                    last_name,
                    role,
                    email,
                    phone,
                    password
                )
                VALUES (?, ?, ?, ?, ?, ?)";


        $stmt = $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


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



    // ============================================================
    // UPDATE PERSONAL INFORMATION
        // ============================================================

   // =========================
// UPDATE PERSONAL INFORMATION
// =========================

    public function updatePersonalInfo(
        $userId,
        $firstName,
        $lastName,
        $phone
    ) {

        $sql = "UPDATE users
                SET
                    first_name = ?,
                    last_name = ?,
                    phone = ?
                WHERE id = ?";

        $stmt =
            $this->connection->prepare($sql);


        if (!$stmt) {

            return false;
        }


        $stmt->bind_param(
            "sssi",
            $firstName,
            $lastName,
            $phone,
            $userId
        );


        if (!$stmt->execute()) {

            return false;
        }


        return true;
    }



    // ============================================================
    // UPDATE PASSWORD
    // ============================================================

    public function updatePassword(
        $userId,
        $password
    ) {

        $sql = "UPDATE users
                SET password = ?
                WHERE id = ?";


        $stmt = $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


        $stmt->bind_param(
            "si",
            $password,
            $userId
        );


        return $stmt->execute();
    }



    // ============================================================
    // DELETE USER
    // ============================================================

   // =========================
// DELETE USER
// =========================

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id = ?";

        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("i", $userId);

        return $stmt->execute();
    }
}

?>
