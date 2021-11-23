<?php
    include_once "header.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <style>
        .center {
          text-align: center;
        }
    </style>
    <section>
        <h1>Upload Media Page</h1>
        <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
            <p>
            <label for="upload">Media File:</label>
            <input type="file" name="file"><BR></BR>
            <label for="user">Username:</label>
            <input type="text" name="username" placeholder="Enter your Username..."><BR></BR>
            <label for="title">Title:</label>
            <input type="text" name="title" placeholder="Media Title"><BR></BR>
            <label for="keywords">Keywords:</label>
            <input type="text" name="keywords" placeholder="Enter keywords so your media can be easily found..."><BR></BR>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="Describe your media for viewers..."><BR></BR>
            <label for="catagory">Choose One Catagory</label>
            <select name="catagories">
            <option value="">Select...</option>
            <option value="entertainment">Enertainment</option>
            <option value="technology">Technology</option>
            <option value="outdoors">Outdoors</option>
            <option value="beauty">Beauty</option>
            <option vaule="other">Other</option>
            </select>
            </p>
            <button type="submit" name="submit">Upload</button>
        </form>
    </section>