<?php

if(isset($_POST["submit"]))
{
    //Grabbing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];
   
     include "../vizsga_project/Connection.php";
    
     include "../vizsga_project/Signup-contr.php";

     $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    //Running error handlers and user signup
    $signup->signupUser();

    //Going back to the front page
    header("location: http://localhost/vizsga_project/?page=index&error=none");
    echo $uid, $pwd, $pwdrepeat, $email;
    print_r($uid, $pwd, $pwdrepeat, $email);
}

