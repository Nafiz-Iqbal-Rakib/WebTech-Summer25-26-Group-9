<?php

require_once __DIR__ . "/Database.php";

class SellerModel
{
    protected $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connection();
    }


    // =====================================================
    // GET SELLER PRODUCTS
    // =====================================================

    public function getSellerProducts($sellerId)
    {
        $sql = "SELECT
                    id,
                    seller_id,
                    product_name,
                    description,
                    price,
                    stock,
                    img

                FROM products

                WHERE seller_id = ?

                ORDER BY id DESC";

        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("i", $sellerId);

        if (!$stmt->execute()) {
            $stmt->close();
            return false;
        }

        $result = $stmt->get_result();

        $products = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        $stmt->close();

        return $products;
    }


    // =====================================================
    // ADD SELLER PRODUCT
    // =====================================================

    public function addSellerProduct(
        $sellerId,
        $productName,
        $description,
        $price,
        $stock,
        $image = null
    ) {
        $imageName = null;


        // =================================================
        // IMAGE UPLOAD
        // =================================================

        if (
            $image !== null &&
            isset($image["tmp_name"]) &&
            isset($image["name"]) &&
            $image["error"] === UPLOAD_ERR_OK
        ) {

            $uploadDirectory =
                __DIR__ . "/../Uploads/products/";


            if (!is_dir($uploadDirectory)) {

                if (!mkdir($uploadDirectory, 0777, true)) {
                    return false;
                }
            }


            $originalName =
                basename($image["name"]);


            $extension =
                strtolower(
                    pathinfo(
                        $originalName,
                        PATHINFO_EXTENSION
                    )
                );


            $allowedExtensions = [
                "jpg",
                "jpeg",
                "png",
                "gif",
                "webp"
            ];


            if (
                !in_array(
                    $extension,
                    $allowedExtensions,
                    true
                )
            ) {
                return false;
            }


            /*
             * The original file name is stored.
             * Only the physical file location uses the upload directory.
             */

            $imageName = $originalName;


            $imagePath =
                $uploadDirectory . $imageName;


            /*
             * If another file has the same name,
             * overwrite the existing file.
             */

            if (!move_uploaded_file(
                $image["tmp_name"],
                $imagePath
            )) {
                return false;
            }
        }


        // =================================================
        // INSERT PRODUCT
        // =================================================

        $sql = "INSERT INTO products
                    (
                        seller_id,
                        product_name,
                        description,
                        price,
                        stock,
                        img
                    )

                VALUES
                    (?, ?, ?, ?, ?, ?)";


        $stmt =
            $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


        $stmt->bind_param(
            "issdis",
            $sellerId,
            $productName,
            $description,
            $price,
            $stock,
            $imageName
        );


        $success =
            $stmt->execute();


        $stmt->close();


        return $success;
    }


    // =====================================================
    // UPDATE SELLER PRODUCT
    // =====================================================

    public function updateSellerProduct(
        $sellerId,
        $productId,
        $productName,
        $description,
        $price,
        $stock
    ) {
        $sql = "UPDATE products

                SET
                    product_name = ?,
                    description = ?,
                    price = ?,
                    stock = ?

                WHERE
                    id = ?
                    AND seller_id = ?";


        $stmt =
            $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


        $stmt->bind_param(
            "ssdiii",
            $productName,
            $description,
            $price,
            $stock,
            $productId,
            $sellerId
        );


        $success =
            $stmt->execute();


        $stmt->close();


        return $success;
    }


    // =====================================================
    // DELETE SELLER PRODUCT
    // =====================================================

    public function deleteSellerProduct(
        $sellerId,
        $productId
    ) {
        $sql = "DELETE FROM products

                WHERE
                    id = ?
                    AND seller_id = ?";


        $stmt =
            $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


        $stmt->bind_param(
            "ii",
            $productId,
            $sellerId
        );


        $success =
            $stmt->execute();


        $stmt->close();


        return $success;
    }


    // =====================================================
    // GET SELLER ORDERS
    // =====================================================

    public function getSellerOrders($sellerId)
    {
        $sql = "SELECT

                    orders.id,

                    buyer.first_name AS buyer_first_name,
                    buyer.last_name AS buyer_last_name,

                    products.product_name,

                    orders.total_price,
                    orders.created_at,
                    orders.status

                FROM orders

                INNER JOIN users AS buyer
                    ON orders.buyer_id = buyer.id

                INNER JOIN products
                    ON orders.product_id = products.id

                WHERE orders.seller_id = ?

                ORDER BY orders.created_at DESC";


        $stmt =
            $this->connection->prepare($sql);


        if (!$stmt) {
            return false;
        }


        $stmt->bind_param(
            "i",
            $sellerId
        );


        if (!$stmt->execute()) {
            $stmt->close();
            return false;
        }


        $result =
            $stmt->get_result();


        $orders = [];


        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }


        $stmt->close();


        return $orders;
    }
}

?>