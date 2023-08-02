<?php

class SignUp extends Connection {

    protected  function setUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_name, users_pwd, users_email) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email)))
        {
            $stmt = null;
            header("location: http://localhost/vizsga_project/?page=index&error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected  function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare('SELECT users_name FROM users WHERE users_name = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $email)))
        {
            $stmt = null;
            header("location: http://localhost/vizsga_project/?page=index&error=stmtfailed");
            exit();
        }
        
        $resultCheck =false;
        if($stmt->rowCount() > 0)
        {
            $resultCheck = false;
        }
        else
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}