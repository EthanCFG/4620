<?php
    include_once '../header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>profile editor</title>
<meta charset="UTF-8">
<style>
        .center {
          text-align: center;
        }
        .vertical{
            margin-bottom: 200px;
        }
</style>
</head>
<body>
<div class = "vertical"></div>
<h1 class = "center">Edit Profile Information</h1>

<div class = "center">
<form action="../includes/editprofile.inc.php" method="post">
        <p>
        <h3>To change current username/email enter current username/email in current username/email box and then enter the new username/email in the following box with you corresponding password</h3>
        <h3> to change passwords you must enter your current username with your current password to change it to the new password<h3>
        <label for="curUser">Current Username</label>
        <input type="text" name="curUser"><BR></BR>
        <label for="newUser">New Username</label>
        <input type="text" name="newUser"><BR></BR>
        <label for="path">Current email</label>
        <input type="text" name="curEmail"><BR></BR>
        <label for="path">New email</label>
        <input type="text" name="newEmail"><BR></BR>
        <label for="pass">Current Password</label>
        <input type="text" name="pass"><BR></BR>
        <label for="pass">New Password</label>
        <input type="text" name="newPwd"><BR></BR>
        </p>
        <button type="submit" name="submit">Submit</button>
        <BR></BR>
</form>
</div>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "userTaken1") {
      echo "<p>Username Taken! Try another new username</p>";
    }
    if ($_GET["error"] == "usernoexists") {
      echo "<p>Username does not exist! Try another current username</p>";
    }
    if ($_GET["error"] == "sucUser") {
      echo "<p>Username changed successfully!</p>";
    }
    if ($_GET["error"] == "emailNoval") {
      echo "<p>Please enter a valid email!</p>";
    }
    if ($_GET["error"] == "emailnoexist") {
      echo "<p>Current email does not exist! Please try another current email</p>";
    }
    if ($_GET["error"] == "emailExist") {
      echo "<p>New email is taken! Please try another new email</p>";
    }
    if ($_GET["error"] == "emailchange") {
      echo "<p>Email changed successfully!</p>";
    }
  }
  ?>
