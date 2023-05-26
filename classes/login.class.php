<?php

class Login extends Dbh
{
    protected function getUser($uname, $pwd)
    {
        $sql = "select * from users where u_name = ? OR u_email = ?";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$uname, $uname])) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        $result = $stmt->fetchAll();

        if (!$result) {
            header("Location: ./index.php?error=usernotfound");
            exit();
        }

        $dehshing = password_verify($pwd, $result[0]['u_pwd']);
        if (!$dehshing) {
            header("Location: ../index.php?error=wrongpass");
            exit();
        } else {
            session_start();
            $_SESSION["uname"] = $result[0]['u_name'];
        }

    }

}
