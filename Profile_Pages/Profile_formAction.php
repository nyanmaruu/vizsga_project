<?php
session_start();

if(isset($_POST["profileAddress"]))
{
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    

   include "../Querys.php";

    $querys= new Querys();
    $user =  $_SESSION["userid"];

    if(empty($firstName || $lastName || $phone || $zip || $city || $address)) {
        header("location: http://localhost/vizsga_project/Profile_Pages/profile.php#error=emptyInputField");
    }else {
        $querys->contactInfoForProfilePage($user, $firstName, $lastName, $zip, $city, $address, $phone);
        header("location: http://localhost/vizsga_project/Profile_Pages/profile.php");
    }
}

if(isset($_POST["profileAddressUpdate"]))
{
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    

   include "../Querys.php";

    $querys= new Querys();
    $user =  $_SESSION["userid"];
 
        $querys->contactInfoForProfilePageUpdate($user, $firstName, $lastName, $zip, $city, $address, $phone);
  
    header("location: http://localhost/vizsga_project/Profile_Pages/profile.php");
}

