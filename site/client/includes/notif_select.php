
<?php

include '../../includes/conn.php';
session_start();
 $id = $_SESSION['user_id'];
       $sql1 = "SELECT * from admin_notification where status = 'unread' AND oauth_id = '$id'";
       $result = $conn->query($sql1);
       $row = $result->fetch_assoc();
       $count = $result->num_rows;
       echo $count;
       $conn->close();
?>