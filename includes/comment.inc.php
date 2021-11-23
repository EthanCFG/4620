<?php
    include_once "functions.inc.php";
    include_once "dbh.inc.php";
    include_once "playback.inc.php";

        if(isset($_POST["submit"]))
        {

        $comment = $_POST["comment"];
        $user = $_SESSION["useruid"];
        leaveComment($conn, $comment, $user, $path);
        
        }