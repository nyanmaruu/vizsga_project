<?php
session_start();

if(isset($_POST["completedOrderBtn"]))
{
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $ccName = $_POST["cc-name"];
    $ccNumber = $_POST["cc-number"];
    $ccExpiration = $_POST["cc-expiration"];
    $ccCvv = $_POST["cc-cvv"];

   include "./Querys.php";

    $querys= new Querys();
    $user =  $_SESSION["userid"];
    if(!empty($user)) {
        $querys->contactInformationAddToDb($user, $firstName, $lastName, $zip, $city, $address, $phone, $ccName, $ccNumber, $ccExpiration, $ccCvv);
    }else {
        $user = 0;
        $querys->contactInformationAddToDb($user, $firstName, $lastName, $zip, $city, $address, $phone, $ccName, $ccNumber, $ccExpiration, $ccCvv);
    }
    unset($_SESSION["cart"]);

    header("location: http://localhost/vizsga_project/?page=index&&completedorder ");
}