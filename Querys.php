<?php
require "Connection.php";

class Querys extends Connection {

public function getCategoryProducts($categoryId) 
{
    if ($categoryId != 'all') {
        $sql = "SELECT * FROM products WHERE categories_id = :categoryId" ;
        $res = $this->conn->prepare($sql);
        $res->execute(['categoryId'=> $categoryId]);
    } else {
        $sql = "SELECT * FROM products" ;
        $res = $this->conn->prepare($sql);
        $res->execute();
    }
   
    $result = $res->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


public function getSearchResult()
{
    $input = $_POST["input"];
    $sql = "SELECT * FROM products WHERE description  LIKE '%".$input."%'";
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


}