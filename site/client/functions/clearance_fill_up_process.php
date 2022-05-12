<?php 

session_start();

include '../../includes/conn.php';

if(isset($_POST['clearance_submit'])) {

	$id = $_SESSION['user_id'];
	// Variables
	$sur_name = $_POST['sur_name'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$full_address = $_POST['full_address'];
	$precint_number = $_POST['precint_number'];
	$payment_method = $_POST['payment_method'];
	$status = "Pending";
	$member_since = date( 'Y-m-d H:i:s', $phpdate );



	// Select User if Existed
	$select_user_clearance = "SELECT * FROM clearance WHERE oauth_id = '$id'";
	$select_user_clearance_result = mysqli_query($conn, $select_user_clearance);

	// Check
	if($select_user_clearance_result -> num_rows > 0) {
    header("Location: ../clearance_fill_up.php?error= User already Exist");
	  } else {
	   $sql = "INSERT INTO clearance (oauth_id, sur_name, first_name, middle_name, full_address, precint_number, purpose, status, created_at) VALUES ('$id','$sur_name', '$first_name', '$middle_name', '$full_address', '$precint_number', '$payment_method', '$status', '$member_since')";
	   $query= mysqli_query($conn,$sql);
	   $_SESSION['success_message'] = "Contact form saved successfully.";
	   header("Location: ../index.php");
}
}

?>