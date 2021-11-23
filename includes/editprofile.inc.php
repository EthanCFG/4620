<?php

if(isset($_POST["submit"]))
{
    $cur = $_POST["curUser"];
    $new = $_POST["newUser"];
    $pass = $_POST["pass"];
    $newPass = $_POST["newPwd"];
    $newEmail = $_POST["newEmail"];
    $curEmail = $_POST["curEmail"];



    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if(changeUN($conn, $cur, $new, $pass) !== false)
    {
        header("location: ../User/editprofile.php?error=sucUser");
        exit();
    }

    if(changeEmail($conn, $cur, $newEmail, $curEmail, $pass) !== false)
    {
        header("location: ../User/editprofile.php?error=emailchange");
        exit();
    }

    if(passChange($conn, $cur, $pass, $newPass) !== false)
    {
        header("location: ../User/editprofile.php?error=passSuccess3");   
        exit();
    }


 
    

    header("location: ../User/editprofile.php");
    exit();
}