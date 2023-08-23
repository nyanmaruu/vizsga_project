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

    public function contactInformationAddToDb($userid, $firstName, $lastName, $zip, $city, $adress, $phone, $ccName, $ccNumber, $ccExpiration, $ccCvv)
    {
        if ($userid != NULL) {

            $db = $this->connect();
            $insertUserid = "INSERT INTO orders (user_id) VALUES (:userid)";
            $res = $db->prepare($insertUserid);
            $res->bindValue(":userid", $userid);
            $res->execute();
        } else {
            $res = NULL;
            header("location: http://localhost/vizsga_project/?page=index&&useridERROR");
            exit();
        }
        if ($userid) {


            $orderid = $db->lastInsertId();
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

            $sql = "INSERT INTO user_adress (userid, firstName, lastName, zip, city, adress, phone, ccName, ccNumber, ccExpiration, ccCvv) VALUES (:userid, :firstName, :lastName, :zip, :city, :adress, :phone, :ccName, :ccNumber, :ccExpiration,:ccCvv)";
            $res = $this->conn->prepare($sql);
            $res->bindValue(":userid", $userid);
            $res->bindValue(":firstName", $firstName);
            $res->bindValue(":lastName", $lastName);
            $res->bindValue(":zip", $zip);
            $res->bindValue(":city", $city);
            $res->bindValue(":adress", $adress);
            $res->bindValue(":phone", $phone);
            $res->bindValue(":ccName", $ccName);
            $res->bindValue(":ccNumber", $ccNumber);
            $res->bindValue(":ccExpiration", $ccExpiration);
            $res->bindValue(":ccCvv", $ccCvv);
            $res->execute();
        } else {
            header("location: http://localhost/vizsga_project/?page=index&&orderError");
            exit();
        }
    }
}
