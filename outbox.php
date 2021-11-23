<?php
    include 'header.php'
?>

<h1>Outbox</h1>
<h2>All messages sent from you:</h2>

<div class="outbox-container">
    <?php
        $user_id = $_SESSION["userid"];
        $sql = "SELECT * FROM msg JOIN user_msg ON msg.id = user_msg.message_id WHERE user_msg.deleted = 'none' AND user_msg.user_id = '$user_id' AND user_msg.folder = 'sent' ORDER BY msg.date";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        if($queryResults > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<a href='msg.php?id=".$row['message_id']."'><div class='out-box'>";
                $to = "SELECT usersUid FROM users JOIN user_msg ON user_msg.user_id = users.usersId WHERE user_msg.message_id = '$row[message_id]' AND user_msg.folder='inbox'";
                $tres = mysqli_query($conn,$to);
                $tr = mysqli_fetch_assoc($tres);
                echo "<h2>".$tr['usersUid']."</h2>
                    <h3>".$row['subject']."</h3>
                    <p>".$row['id']."</p>
                    <p>".$row['date']."</p>
                </div></a>";
            }
        } else {
            echo "You have sent no messages.";
        }
    ?>