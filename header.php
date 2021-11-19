
<?php
  session_start();
  include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
</head>
  <body>
<nav>
        <a href="index.php"><img src="img/logo-white.png" alt="MeTube"></a>
        <ul>
          <li><a href="index.php">Home</a></li>
<<<<<<< HEAD
          <li><a href="filemanager.php">Upload</a></li>
=======
>>>>>>> 61a43bed009eb87b23d523d5f5282ce75ebca0f5
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