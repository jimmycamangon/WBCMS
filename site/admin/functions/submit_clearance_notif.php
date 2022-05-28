<?php 

session_start();

include '../../includes/conn.php';

if(isset($_POST['clearance_submit'])) {

	// Variables for clearance table

	$oauth_id = $_GET['oauth_id'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$date_time = $_POST['date_time'];
	$since = date( 'Y-m-d H:i:s', $phpdate );

	// Variable for requests table

	$type = "Clearance";



	// Select User if Existed
	$select_user_clearance = "SELECT * FROM admin_notification WHERE oauth_id = '$id'";
	$select_user_clearance_result = mysqli_query($conn, $select_user_clearance);

	// Check
	if($select_user_clearance_result -> num_rows > 0) {
    echo '<script>alert("Admin already requested");</script';
	  } else {

	   $set = "UPDATE clearance SET request_status = 'To_Claim' WHERE oauth_id = '$oauth_id'";
        $set_result = $conn->query($set);
	   // Insert into requests table
	   $requests = "INSERT INTO admin_notification (oauth_id, subject, description, date_time, status, created_at) VALUES ('$oauth_id','$subject','$description','$date_time','unread','$since')";
	   $requests_query = mysqli_query($conn,$requests);
	
	   $_SESSION['success_message'] = "Clearance Scheduled Succesfully";
	   header("Location: ../index.php");
}
}

?>