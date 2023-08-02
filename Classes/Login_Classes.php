<?php

class Login extends Connection {

    protected  function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_name = ? OR users_email = ?;');
        
       

        if(!$stmt->execute(array($uid, $pwd)))
        {
            $stmt = null;
            header("location: http://localhost/vizsga_project/?page=index&error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: http://localhost/vizsga_project/?page=index&error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"] );

        if($checkPwd == false)
        {
            $stmt = null;
            header("location: http://localhost/vizsga_project/?page=index&error=wrongpwd");
            exit();
        }
        elseif($checkPwd == true)
        {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_name = ? OR users_email = ? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid, $uid, $pwd)))
                {
                    $stmt = null;
                    header("location: http://localhost/vizsga_project/?page=index&error=stmtfailed");
                    exit();
                }
          
                
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                session_start();
                $_SESSION["userid"] = $user[0]["id"];
                $_SESSION["useruid"] = $user[0]["users_name"];
                
        }

        $stmt = null;
    }

    
}
