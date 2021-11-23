<?php
    include_once 'header.php';

?>

<div class="message-container">
    <?php


        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM msg WHERE id='$id'";
        $sql_result = mysqli_query($conn, $sql);
        $msg = mysqli_fetch_assoc($sql_result);
        $subj = $msg['subject'];
        echo $subj;

        $sender = "SELECT * FROM users JOIN user_msg ON users.usersId = user_msg.user_id WHERE user_msg.message_id = '$id' AND user_msg.folder = 'sent'";
        $send_result = mysqli_query($conn, $sender);
        $to = mysqli_fetch_assoc($send_result);

        $rec = "SELECT * FROM users JOIN user_msg ON users.usersId = user_msg.user_id WHERE user_msg.message_id = '$id' AND user_msg.folder = 'inbox'";
        $rec_result = mysqli_query($conn, $rec);
        $from = mysqli_fetch_assoc($rec_result);

        echo "<div class = 'msg-box'>
             <h3>".$msg['subject']."</h3>
             <p>from:  ".$from['usersUid']."</p>
             <p>to:  ".$to['usersUid']."</p>
            <p>".$msg['body']."</p>
            <p>".$msg['date']."</p></div>";

        if($from['usersId']!==$_SESSION["userid"]){
            echo "<a href ='messaging.php?sentto=".$from['usersUid']."'><p>reply</p></a>";
        }
    ?>
</body>
</html>


