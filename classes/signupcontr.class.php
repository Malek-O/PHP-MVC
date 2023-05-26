<?php

class SignupContr extends Signup
{

    private $uname;
    private $email;
    private $pwd;
    private $rpwd;

    public function __construct($uname, $email, $pwd, $rpwd)
    {
        $this->uname = $uname;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->rpwd = $rpwd;
    }

    public function createUser()
    {
        if ($this->emptyInput()) {
            header("Location: ../index.php?error=emptyInput");
            exit();
        }
        if (!$this->invalidUname()) {
            header("Location: ../index.php?error=invalidUname");
            exit();
        }
        if (!$this->invalidEmail()) {
            header("Location: ../index.php?error=invalidEmail");
            exit();
        }
        if ($this->isUnameExist()) {
            header("Location: ../index.php?error=UnameExist");
            exit();
        }
        if (!$this->pwdMatch()) {
            header("Location: ../index.php?error=passdontmatch");
            exit();
        }

        $this->setUser($this->uname, $this->email, $this->pwd);
    }

    private function emptyInput()
    {
        return (empty($this->uname) || empty($this->email) || empty($this->pwd) || empty($this->rpwd));
    }
    private function invalidUname()
    {
        return preg_match('/^[a-zA-Z0-9]+$/', $this->uname);
    }
    private function pwdMatch()
    {
        return $this->pwd === $this->rpwd;
    }
    private function invalidEmail()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
    private function isUnameExist()
    {
        return $this->unameExist($this->uname, $this->email);
    }

}
