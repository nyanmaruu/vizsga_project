

<?php
 session_start();

if(isset($_POST["login"]))
{
    
    $uid = $_POST["loginuid"];
    $pwd = $_POST["loginpwd"];
    print_r($uid, $pwd);
   
   
    include "../vizsga_project/Connection.php";

    include "../vizsga_project/Login-contr.php";

    $login = new LoginContr($uid, $pwd);

    
    $login->loginUser();

    if (isset($_SESSION["userid"]) && $_SESSION["usertypeid"] == 1) {
    header("location: http://localhost/vizsga_project/Admin_Pages/admin.php");

    } else {
       
        header("location: http://localhost/vizsga_project/?page=index&error=none");
    }

    
   


}

