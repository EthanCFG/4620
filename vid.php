<?php
    include_once 'header.php';
?>

<h1>Media page</h1>

<div class="media-container">
    <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM uploadData WHERE filepath='$id'";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='media-box'>
                    <h3>".$row['title']."</h3>
                    <p>".$row['descrip']."</p>
                    <video width='320' height='240' controls>
                        <source src='uploads/".$id."' type='video/mp4'>
                    </video>
                    <p>".$row['userName']."</p>
                    </div>";
            }
        }
        ?>


</body>
</html>