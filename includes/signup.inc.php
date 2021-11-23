<?php

if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(inputEmpty($name, $email, $username, $pwd, $pwdRepeat) !== false)
    {
        header("location: ../User/signup.php?error=inputEmpty");
        exit();
    }

    if(emailInvalid($email) !== false)
    {
        header("location: ../User/signup.php?error=invalidemail");
        exit();
    }

    if(usernameInvalid($username) !== false)
    {
        header("location: ../User/signup.php?error=invalidusername");

        exit();
    }

    if(passMatch($pwdRepeat, $pwd) !== false)
    {
        header("location: ../User/signup.php?error=passwordontmatch");
        exit();
    }

    if(userExists($conn, $username, $email) !== false)
    {
        header("location: ../User/signup.php?error=usernametaken");
        exit();
    }

    makeUser($conn, $name, $email, $username, $pwd);

}
else
{
    header("location: ../User/signup.php");
    exit();
}