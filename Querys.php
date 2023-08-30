<?php

require "Connection.php";

class Querys extends Connection
{

    public function getCategoryProducts($categoryId)
    {
        if ($categoryId != 'all') {
            $sql = "SELECT * FROM products WHERE categories_id = :categoryId";
            $res = $this->conn->prepare($sql);
            $res->execute(['categoryId' => $categoryId]);
        } else {
            $sql = "SELECT * FROM products";
            $res = $this->conn->prepare($sql);
            $res->execute();
        }

        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSearchResult()
    {
        $input = $_POST["input"];
        $sql = "SELECT * FROM products WHERE description  LIKE '%" . $input . "%'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getProduct($productId)
    {
        $sql = "SELECT * FROM products WHERE id LIKE :id";
        $res = $this->conn->prepare($sql);
        $res->execute(["id" => $productId]);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addToModal($productId)
    {
        $sql = "SELECT * FROM products WHERE id LIKE :id";
        $res = $this->conn->prepare($sql);
        $res->execute(["id" => $productId]);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function contactInformationAddToDb($userid)
    {

        $db = $this->connect();

        $res = $db->prepare("SELECT address_id from user_adress  WHERE  userid = :userid");
        $res->bindValue(":userid", $userid);
        $res->execute();
        $addressIdResult = $res->fetchAll(PDO::FETCH_ASSOC);

        $addresId  = $addressIdResult[0]["address_id"];

        echo $addresId;

        if (!empty($userid)) {

            $db = $this->connect();
            $res = $db->prepare("INSERT INTO orders (user_id,address_id) VALUES (:userid,:address_id)");
            $res->bindValue(":userid", $userid);
            $res->bindValue(":address_id", $addresId);
            $res->execute();
        }

        $orderid = $db->lastInsertId();



        if ($userid && !empty($addresId)) {

            foreach ($_SESSION["cart"] as $orderData) {
                $sql = "INSERT INTO order_products (order_id, product_id, quantity, price, total_price) VALUES (:order_id, :products_id, :quantity, :price, :total_price)";
                $res = $this->conn->prepare($sql);
                $res->bindValue(":order_id", $orderid);
                $res->bindValue(":products_id", $orderData["id"]);
                $res->bindValue(":quantity",  $orderData["quantity"]);
                $res->bindValue(":price",  $orderData["baseprice"]);
                $res->bindValue(":total_price", $orderData["baseprice"] * $orderData["quantity"]);
                $res->execute();
            }
        } else {
            header("location: http://localhost/vizsga_project/?page=index&&orderError");
            exit();
        }
    }





    // on admin page we get the orders in the table
    public function addOrderToTable()
    {
        $sql = "SELECT
        b.id,
        a.firstName,
        a.lastName,
        a.adress,
        SUM(c.total_price) AS total_ordered_price,
        b.createdAt,
        d.users_email
    FROM
        user_adress a
    INNER JOIN
        orders b ON b.user_id = a.userid
    INNER JOIN
        order_products c ON c.order_id = b.id
    INNER JOIN 
        users d ON d.id = b.user_id
    GROUP BY
        a.firstName,
        a.lastName,
        a.adress,
        b.createdAt,
        d.users_email
    ORDER BY
        b.createdAt ASC;
    
    
    ";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getOrderId()
    {
        $sql = "SELECT id FROM orders";
        $res = $this->conn->prepare($sql);
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function deleteOrder($orderId)
    {
        $sql = "DELETE  FROM orders WHERE id = :id";
        $res = $this->conn->prepare($sql);
        $res->bindValue(":id", $orderId);
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function countAllOrder()
    {
        $sql = "SELECT COUNT(*) AS ordersNumber FROM orders";
        $res = $this->conn->prepare($sql);
        $res->execute();

        return $res;
    }

    public function countAllUsers()
    {
        $sql = "SELECT COUNT(*) AS usersNumber FROM users WHERE type_id = 0";
        $res = $this->conn->prepare($sql);
        $res->execute();

        return $res;
    }

    public function countAllAdmins()
    {
        $sql = "SELECT COUNT(*) AS adminsNumber FROM users WHERE type_id = 1";
        $res = $this->conn->prepare($sql);
        $res->execute();

        return $res;
    }

    public function countAllProducts()
    {
        $sql = "SELECT COUNT(*) AS productsNumber FROM products";
        $res = $this->conn->prepare($sql);
        $res->execute();

        return $res;
    }

    public function contactInfoForProfilePage($userid, $firstName, $lastName, $zip, $city, $address, $phone)
    {

        $sql = "INSERT INTO user_adress (userid, firstName, lastName, zip, city, adress, phone) VALUES (:userid, :firstName, :lastName, :zip, :city, :adress, :phone)";
        $res = $this->conn->prepare($sql);
        $res->bindValue(":userid", $userid);
        $res->bindValue(":firstName", $firstName);
        $res->bindValue(":lastName", $lastName);
        $res->bindValue(":zip", $zip);
        $res->bindValue(":city", $city);
        $res->bindValue(":adress", $address);
        $res->bindValue(":phone", $phone);
        $res->execute();

        $sql = "SELECT address_id from user_adress where userid = :userid";
        $res = $this->conn->prepare($sql);
        $res->bindValue(":userid", $userid);
        $res->execute();
        $userData = $res->fetchAll(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["addressId"] = $userData[0]["address_id"];
    }


    public function getAddresInfo()
    {
        $userid =  $_SESSION["userid"];

        $sql = "SELECT firstName,lastName,zip,city,adress,phone from user_adress where userid = :userid";
        $res = $this->conn->prepare($sql);
        $res->bindValue(":userid", $userid);
        $res->execute();
        $userData = $res->fetchAll(PDO::FETCH_ASSOC);
        return $userData;
    }

    public function contactInfoForProfilePageUpdate($userid, $firstName, $lastName, $zip, $city, $address, $phone)
    {

        $sql = "UPDATE user_adress SET firstName = :firstName , lastName = :lastName, zip = :zip , city = :city , adress = :adress , phone = :phone  WHERE userid = :userid";
        $res = $this->conn->prepare($sql);
        $res->bindValue(":userid", $userid);
        $res->bindValue(":firstName", $firstName);
        $res->bindValue(":lastName", $lastName);
        $res->bindValue(":zip", $zip);
        $res->bindValue(":city", $city);
        $res->bindValue(":adress", $address);
        $res->bindValue(":phone", $phone);
        $res->execute();
    }
}
