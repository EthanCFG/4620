<?php

    include_once "functions.inc.php";
    include_once "dbh.inc.php";

    /*$username = $_POST["username"];
    $title = $_POST["title"];
    $keywords = $_POST["keywords"];
    $catagory = $_POST["catagory"];
    $description = $_POST["descrip"];
    $path = $_POST["filePath"];*/

    $info = getVideo($conn, $username);

    $username = $info["userId"];
    $title = $info["title"];
    $keywords = $info["keywords"];
    $catagory = $info["catagory"];
    $description = $info["descrip"];
    $path = $info["filePath"];

