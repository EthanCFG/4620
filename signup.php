<?php
  include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign up</title>
<meta charset="UTF-8">
<style>
        .center {
          text-align: center;
        }
</style>
</head>
<body>
<div class = "vertical"></div>
<section>
<h1 class = "center">MeTube Sign up</h1>

<div class = "center">
<form action="includes/signup.inc.php" method="post">
        <p>
        <label for="fullname">Full name:</label>
        <input type="text" name="name" placeholder="Full name..."><BR></BR>
        <label for="email">E-mail</label>
        <input type="text" name="email" placeholder="Email..."><BR></BR>
        <label for="Username">Username</label>
        <input type="text" name="uid" placeholder="Username..."><BR></BR>
        <label for="Pasword">Password</label>
        <input type="password" name="pwd" placeholder="Password..."><BR></BR>
        <label for="rePass">Re-enter password</label>
        <input type="password" name="pwdrepeat" placeholder="Repeat password..."><BR></BR>
        </p>
        <button type="submit" name="submit">Sign up</button>
        <BR></BR>
        <a href='login.php'>Return to login</a>
</form>
</div>
</section>
<?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invalidusername") {
        echo "<p>Username Taken! Choose another username!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords doesn't match!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
      }
    }
  ?>
</body>
</html>




