

<?php
 session_start();

if(isset($_POST["login"]))
{
    //Grabbing the data
    $uid = $_POST["loginuid"];
    $pwd = $_POST["loginpwd"];
    print_r($uid, $pwd);
   
   
    include "../vizsga_project/Connection.php";

    include "../vizsga_project/Login-contr.php";

    $login = new LoginContr($uid, $pwd);

    //Running error handlers and user signup
    $login->loginUser();

    if (isset($_SESSION["userid"]) && $_SESSION["usertypeid"] == 1) {
    header("location: http://localhost/vizsga_project/Admin_Pages/admin.php");

    } else {
        //Going back to the front page
        header("location: http://localhost/vizsga_project/?page=index&error=none");
    }

    
   


}

