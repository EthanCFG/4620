<?php
    include_once 'header.php';
    include_once 'includes/dbh.inc.php';
?>

<form action="search.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search"></button>
</form>

<h1>Front page</h1>
<h2>All videos:</h2>

<div class="media-container">
    <?php
        $sql = "SELECT * FROM uploadData";
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResults > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='media-box'>
                    <h3>".$row['title']."</h3>
                    <p>".$row['descrip']."</p>
                    <p>".$row['category']."</p>
                    <p>".$row['userName']."</p>
                </div>";
            }
        }
    ?>

</body>
</html>