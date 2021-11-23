<?php
    include 'header.php';
?>

<h1>Search page</h1>

<div class="media-container">

<?php
    if(isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM uploadData WHERE title LIKE '%$search%' OR descrip LIKE '%$search%' OR userName LIKE '%$search%' OR keywords LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        echo "There are".$queryResult."results!";

        if($queryResult > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<a href='vid.php?id=".$row['filePath']."'><div class='media-box'>
                    <h3>".$row['title']."</h3>
                    <p>".$row['descrip']."</p>
                    <p>".$row['category']."</p>
                    <p>".$row['userName']."</p>
                </div></a>";
            }
        } else {
            echo "There are no results matching your search!";
        }
    }
?>
</div>