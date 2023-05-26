<?php
include "../classes/dbh.class.php";
include "../classes/login.class.php";
include "../classes/logincontr.class.php";

if (isset($_POST['submit'])) {

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $login = new LoginContr($uname, $pwd);

    $login->loginUser();
    header("Location: ../index.php?error=none");

}
