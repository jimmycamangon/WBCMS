
 <?php

 
include '../../includes/conn.php';
 
     

       $sql = "UPDATE requests SET status = 'read' where status = 'unread'";

if ($conn->query($sql) === TRUE) {
  //  echo "No Notification";
} else {
 //   echo "Error updating record: " . $conn->error;
}

         $sql1 = "SELECT * from requests where status = 'unread'";
       $result1 = $conn->query($sql1);
       $row1 = $result1->fetch_assoc();
       $count1 = $result1->num_rows;
       echo $count1;
       $conn->close();

?>