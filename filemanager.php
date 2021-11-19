<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <style>
        .center {
          text-align: center;
        }
        .vertical{
            margin-bottom: 200px;
        }
    </style>
    <body>
        <div class = "vertical"></div>
        <h1 class = "center">Media Upload Page</h1>    
        <div class = "center">
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
            <label for="catagory">Catagory:</label>
            <input type="text" name="catagory" placeholder="Games, Outdoors, Makeup, IRL..."><BR></BR>
            </p>
            <button type="submit" name="submit">Upload</button>
        </form>
        </div>
    </body>
</html>