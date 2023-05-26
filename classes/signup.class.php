<?php

class Signup extends Dbh
{
    protected function unameExist($uname, $email)
    {
        $sql = "select * from users where u_name = ? OR u_email = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$uname, $email])) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        return count($stmt->fetchAll()) > 0;

    }

    protected function setUser($uname, $email, $pwd)
    {
        $sql = "insert into users (u_name,u_email,u_pwd) values(?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute([$uname, $email, $hashedPwd])) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}
