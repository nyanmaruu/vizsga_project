<?php
include "../vizsga_project/Classes/Login_Classes.php";
class LoginContr extends Login  {

    private $uid;
    private $pwd;
    
    
    public function __construct($uid, $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
      
    }

    public function loginUser()
    {
        if($this->emptyInput() == false)
        {
            // echo "Empty input!";
            header("location: http://localhost/vizsga_project/?page=signupPage&error=emptyinput");
            exit();
        }
        

        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput()
    {
        $result = false;
        if(empty($this->uid || $this->pwd))
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    
}