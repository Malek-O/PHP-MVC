<?php

class LoginContr extends Login
{

    private $uname;
    private $pwd;

    public function __construct($uname, $pwd)
    {
        $this->uname = $uname;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if (empty($this->uname) || empty($this->pwd)) {
            header("Location: ../index.php?error=emptyInput");
            exit();
        }
        $this->getUser($this->uname, $this->pwd);
    }

}
