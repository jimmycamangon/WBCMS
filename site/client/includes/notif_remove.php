
 <?php

 
include '../../includes/conn.php';
 
session_start();
$id = $_SESSION['user_id'];
       $sql = "UPDATE admin_notification SET status = 'read' where status = 'unread'";

if ($conn->query($sql) === TRUE) {
  //  echo "No Notification";
} else {
 //   echo "Error updating record: " . $conn->error;
}

         $sql1 = "SELECT * from admin_notification where status = 'unread' AND oauth_id = '$id'";
       $result1 = $conn->query($sql1);
       $row1 = $result1->fetch_assoc();
       $count1 = $result1->num_rows;
       echo $count1;
       $conn->close();

?>