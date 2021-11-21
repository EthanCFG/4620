<?php
  include_once "header.php";
  include_once "includes/playback.inc.php";
?>

<section class="video-player">
    <video width="1280" height="720" controls>
    <source src="uploads/<?php echo "$file"?>" type="video/mp4">
    </video>
    <h1><?php echo "$title"?></h1>
    <p>Posted by:<?php echo "$username"?></p>
    <p>Description:</p>
    <p><?php echo "$description"?></p>

</section>