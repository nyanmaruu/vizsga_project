<?php

if(isset($_POST["login"]))
{
    //Grabbing the data
    $uid = $_POST["loginuid"];
    $pwd = $_POST["loginpwd"];

    echo $uid, $pwd;
    print_r($uid, $pwd);
   
   
    include "../vizsga_project/Connection.php";

    include "../vizsga_project/Login-contr.php";

    $login = new LoginContr($uid, $pwd);

    //Running error handlers and user signup
    $login->loginUser();

    //Going back to the front page
    header("location: http://localhost/vizsga_project/?page=index&error=none");
}