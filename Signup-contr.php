<?php
include "../vizsga_project/Classes/Signup_Classes.php";
class SignupContr extends SignUp  {

    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;
    
    public function __construct($uid, $pwd, $pwdrepeat,$email )
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false)
        {
            // echo "Empty input!";
            header("location: http://localhost/vizsga_project/?page=signupPage&error=emptySignupinput");
            exit();
        }
        if($this->invalidUid() == false)
        {
            // echo "Invalid username!";
            header("location: http://localhost/vizsga_project/?page=signupPage&error=wrongUsernameOrPwd");
            exit();
        }
        if($this->invalidEmail() == false)
        {
            // echo "Invalid email!";
            header("location: http://localhost/vizsga_project/?page=signupPage&error=invalidemail");
            exit();
        }
        if($this->pwdMatch() == false)
        {
            // echo "Passwords dont't match!";
            header("location: http://localhost/vizsga_project/?page=signupPage&error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false)
        {
            // echo "Username or email taken!";
            header("location: http://localhost/vizsga_project/?page=signupPage&error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput()
    {
        $result = false;
        if(empty($this->uid) || empty($this->pwd) ||  empty($this->pwdrepeat) || empty($this->email))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid()
    {
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        $result = false;
        if($this->pwd !== $this->pwdrepeat)
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck()
    {
        $result = false;
        if(!$this->checkUser($this->uid, $this->email))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}