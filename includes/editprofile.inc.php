<?php

if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $birth = $_POST["bday"];
    $gender = $_POST["gen"];
    $path = $_POST["pathWay"];
    $pass = $_POST["pass"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(loginUse($email) !== false)
    {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    

    

}