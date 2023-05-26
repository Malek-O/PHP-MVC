<?php
include "../classes/dbh.class.php";
include "../classes/signup.class.php";
include "../classes/signupcontr.class.php";

if (isset($_POST['submit'])) {

    //Grab data
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];

    $signup = new SignupContr($uname, $email, $pwd, $rpwd);

    $signup->createUser();
    header("Location: ../index.php?error=none");

}
