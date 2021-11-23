
<?php
  include_once 'session.php';
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MeTube</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
  <body>
<nav>
        <a href="index.php"><img src="img/logo.png" alt="MeTube"></a>
        <ul>
          <?php
            if (isset($_SESSION["useruid"])) {
              echo "<li><a href='../index.php'>Home</a></li>";
              echo "<li><a href='videoPlay.php'>Top Videos</a></li>";
              echo "<li><a href='test.php'>Test</a></li>";
              echo "<li><a href='User/profile.php'>Profile Page</a></li>";
              echo "<li><a href='filemanager.php'>Upload Media</a></li>";
              echo "<li><a href='User/logout.php'>Logout</a></li>";
            }
            else {
              echo "<li><a href='index.php'>Home</a></li>";
              echo "<li><a href='test.php'>Test</a></li>";
              echo "<li><a href='videoPlay.php'>Top Video</a></li>";
              echo "<li><a href='User/signup.php'>Sign up</a></li>";
              echo "<li><a href='User/login.php'>Log in</a></li>";
            }
          ?>
        </ul>
      </div>
    </nav>
  
<div class="wrapper">
