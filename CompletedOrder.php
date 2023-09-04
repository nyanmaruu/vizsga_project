<?php
session_start();

if(isset($_POST["completedOrderBtn"]))
{
    $ccName = $_POST["cc-name"];
    $ccNumber = $_POST["cc-number"];
    $ccExpiration = $_POST["cc-expiration"];
    $ccCvv = $_POST["cc-cvv"];

   include "./Querys.php";

    $querys= new Querys();
    $user =  $_SESSION["userid"];
    if(empty($ccName || $ccNumber || $ccExpiration ||  $ccCvv)) {
        header("location: http://localhost/vizsga_project/?page=checkoutPage&&error=missingCreditInfos");
    } 
    else if(empty($ccName)){
        header("location: http://localhost/vizsga_project/?page=checkoutPage&&error=missingccName");
    }
    else if(empty($ccNumber)){
        header("location: http://localhost/vizsga_project/?page=checkoutPage&&error=missingccNumber");
    }
    else if(empty($ccExpiration)){
        header("location: http://localhost/vizsga_project/?page=checkoutPage&&error=missingccExpiration");
    }
    else if(empty($ccCvv)){
        header("location: http://localhost/vizsga_project/?page=checkoutPage&&error=missingccCvv");
    }
    else if (empty($_SESSION["cart"])) {
        header("location: http://localhost/vizsga_project/?page=checkoutPage&erroremptyCart");
    }
    else {
        $querys->contactInformationAddToDb($user);
        header("location: SuccessfullyPayment\successfullyPayment.php");
        unset($_SESSION["cart"]);
    }
}