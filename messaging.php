<?php
    include_once 'header.php';
?>

<form action="messaging.php" method="POST">
    <input type="text" name="to" placeholder="To:" value = "<?php echo $_GET['sentto'] ?>">
    <input type="subject" name="subject" placeholder="Subject:">
    <input type="text" name="body" placeholder="Text:">
    <button type="submit" name="submit-msg"></button>
</form>

<?php
    if(isset($_POST['submit-msg'])) {
            $sender = $_SESSION["userid"];
            $receiver = $_POST['to'];
            $subj = $_POST['subject'];
            $body = $_POST['body'];

            $msg_sql = "INSERT INTO msg ( subject, body) VALUES ('$subj','$body')";
            mysqli_query($conn,$msg_sql);
            $store_id= $conn->insert_id;

            $rec_un = "SELECT * FROM users WHERE usersUid = '$receiver'";
            $res_un = mysqli_query($conn, $rec_un);
            $ru = mysqli_fetch_assoc($res_un);
            $rec_user = $ru['usersId'];

            $inbox_sql = "INSERT INTO user_msg ( message_id, user_id, folder, unread, deleted) VALUES ('$store_id', '$rec_user', 'inbox', '1', 'none')";
            mysqli_query($conn, $inbox_sql);


            $outbox_sql = "INSERT INTO user_msg ( message_id, user_id, folder, unread, deleted) VALUES ('$store_id', '$sender', 'sent', '1', 'none')";
            mysqli_query($conn, $outbox_sql);
            header("location: ../meTube/msg.php?id=".$store_id."");

    }

?>
