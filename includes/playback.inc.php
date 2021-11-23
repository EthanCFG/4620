<?php

    include_once "functions.inc.php";
    include_once "dbh.inc.php";

    
    $path = getVideo($conn);

    if(isset($_POST["submit"]))
    {

    $comment = $_POST["comment"];
    $user = $_SESSION["username"];
    header("location: ../videoPlay.php?commentSuccess");

    }

        