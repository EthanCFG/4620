<?php
    include_once 'header.php';
?>

<h1>Inbox</h1>
<h2>All messages sent to you:</h2>

<div class="inbox-container">
    <?php
        $user_id = $_SESSION["userid"];
        $sql = "SELECT * FROM msg JOIN user_msg ON msg.id = user_msg.message_id WHERE user_msg.deleted = 'none' AND user_msg.user_id = '$user_id' AND user_msg.folder='inbox' ORDER BY msg.date";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);


        if($queryResults > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<a href='msg.php?id=".$row['message_id']."'><div class='in-box'>";
                $from = "SELECT usersUid FROM users JOIN user_msg ON user_msg.user_id = users.usersId WHERE user_msg.message_id = '$row[message_id]' AND user_msg.folder='sent'";
                $fres = mysqli_query($conn,$from);
                $fr = mysqli_fetch_assoc($fres);

                echo "<h2>".$fr['usersUid']."<h2>
                    <h3>".$row['subject']."</h3>
                </div></a>";
            }
        } else {
            echo "You have no messages.";
        }
    ?>