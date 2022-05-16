
<?php

include '../../includes/conn.php';
 
       $sql1 = "SELECT * from notifications where status = 'unread'";
       $result = $conn->query($sql1);
       $row = $result->fetch_assoc();
       $count = $result->num_rows;
       echo $count;
       $conn->close();
?>