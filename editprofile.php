<?php
    include_once 'header.php';
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
<form action="includes/editprofile.inc.php" method="post">
        <p>
        <label for="Username">Name</label>
        <input type="text" name="user"><BR></BR>
        <label for="email">About Me</label>
        <input type="text" name="bio"><BR></BR>
        <label for="bday">Birthday</label>
        <input type="text" name="bday"><BR></BR>
        <label for="gender">Gender</label>
        <input type="text" name="gen"><BR></BR>
        <label for="path">Videos</label>
        <input type="text" name="path"><BR></BR>
        <label for="pass">Password change</label>
        <input type="text" name="pass"><BR></BR>
        
        </p>
        <button type="submit" name="submit">Submit</button>
        <BR></BR>
</form>
</div>
