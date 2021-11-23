<?php
  error_reporting(E_ERROR | E_PARSE);
  include_once "header.php";
  include_once "includes/playback.inc.php";
?>

<section class="video-player">
    <img src="uploads/<?php echo "$path" ?>" alt=<?php echo "$title" ?> width="320" height="240">
    <p><a href="uploads/<?php echo "$path" ?>">Download</a></p>
    <?php
      if(isset($_SESSION["useruid"])) {
        echo "<form action='includes/comment.inc.php' method='post'>";
        echo "<label for='comment'>Comment:</label>";
        echo "<input type='text' name='comment' placeholder='Leave a comment...'>";
        echo "<button type='submit' name='submit'>Post</button>";
        echo "</form>";
      }
    ?>
    <h1>Comments</h1>
        <?php
        $sql = "SELECT * FROM comments WHERE media = '$path' ";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_fetch_assoc($result) == 0)
        {
         ?>
          <div class="comment">
          <p>
          There are no comments yet.
          </p>
          </div>
        <?php
        }
        else
        {
          while($row = mysqli_fetch_assoc($result))
          {
            $auth = $row["author"];
            $comm = $row["comment"];
          ?>
          <div class="comment">
            By: <?php echo "$auth"?>
            <p>
            <?php echo "$comm" ?>
            </p>
          </div>
        <?php
        }
        }
        ?>
</section>