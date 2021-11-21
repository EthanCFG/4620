<?php
  include_once "header.php";
  include_once "includes/playback.inc.php";
?>

<section class="video-player">
    <video width="320" height="240" controls>
    <source src="uploads/<?php echo "$path" ?>" type="video/mp4">
    </video>
    <p><a href="uploads/<?php echo "$path" ?>">Download</a></p>
    <p><?php echo "$path"?></p>
</section>