<?php
  error_reporting(E_ERROR | E_PARSE);
  include_once "header.php";
  include_once "includes/playback.inc.php";
?>

<section class="video-player">
    <video width="320" height="240" controls>
    <source src="uploads/<?php echo "$path" ?>" type="video/mp4">
    </video>
    <p><a href="uploads/<?php echo "$path" ?>">Download</a></p>
    <?php
      if(isset($_SESSION["useruid"])) {
        echo "<form action='includes/playback.inc.php' method='post'>";
        echo "<label for='comment'>Comment:</label>";
        echo "<input type='text' name='comment' placeholder='Leave a comment...'>";
        echo "<button type='submit' name='submit'>Post</button>";
        echo "</form>";
      }
    ?>
    <h1>Comments</h1>
        <?php
        $sql = "SELECT * FROM comments WHERE filep = '$path' ";
        $result = mysqli_query($conn, $sql);
        if(!$result)
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
          ?>
           <div class="comment">
            By: <?php echo "$row->author"?>
            <p>
            <?php echo "$row->comment" ?>
            </p>
            </div>
        <?php
        }
        }
        ?>
</section>