<?php
if(isset($_POST['submit']))
{
    $file = $_FILES['file'];
    $username = $_POST["username"];
    $title = $_POST["title"];
    $keywords = $_POST["keywords"];
    $catagory = $_POST["catagory"];
    $description = $_POST["description"];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif', 'wmv', 'mp4', 'mov');


    if(in_array($fileActualExt, $allowed))
    {
        if($fileError === 0)
        {
            if($fileSize > 1)
            {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                echo "<p>post file dest</p>";
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "<p>post move</p>";
                uploadMedia($conn, $username, $title, $keywords, $description, $catagory, $fileNameNew);
                echo "<p>post upload</p>";
            }
            else
            {
                echo "File Too Large";
            }
        }
        else
        {
            echo "Error Uploading File: ".$file['error'];
        }
    }
    else
    {
        echo "File Type Not Supported";
    }
}