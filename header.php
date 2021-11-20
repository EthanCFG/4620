
<?php
  session_start();
  include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MeTube</title>
    <!--I won't do more than barebone HTML, since this isn't an HTML tutorial.-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  <body>
<nav>
        <a href="index.php"><img src="img/logo.png" alt="MeTube"></a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <?php
            if (isset($_SESSION["useruid"])) {
              echo "<li><a href='User/profile.php'>Profile Page</a></li>";
              echo "<li><a href='User/logout.php'>Logout</a></li>";
            }
            else {
              echo "<li><a href='User/signup.php'>Sign up</a></li>";
              echo "<li><a href='User/login.php'>Log in</a></li>";
            }
          ?>
        </ul>
      </div>
    </nav>
  
<div class="wrapper">
