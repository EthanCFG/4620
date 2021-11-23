<?php

if (isset($_POST["submit"])) {


  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  if (emptyInputLogin($username, $pwd) === true) {
    header("location: ../User/login.php?error=emptyinput");
		exit();
  }

  $_SESSION["useruid"] = $username;


  loginUser($conn, $username, $pwd);

} else {
	header("location: ../User/login.php");
    exit();
}
