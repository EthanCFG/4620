<?php
    include_once "dbh.inc.php";


    $sql = "SELECT mediaType FROM uploadData WHERE filePath = $path";
    $result = mysqli_query($conn, $sql);
    if(!$result || mysqli_fetch_assoc($result) == 0)
    {
         header("location: index.php?error=nofile");
         exit();
    }
    else
    {
        if($row = mysqli_fetch_assoc($result))
        {
            $fileType = $row["mediaType"];
        }

        if($fileType = ".mp4" || $fileType = ".mov" )
        {
            header("location: videoPlay.php");
            exit();
        }
        else
        {
            header("location: imgDis.php");
            exit();
        }
    }