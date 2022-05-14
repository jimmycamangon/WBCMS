<?php 

session_start();

include '../../includes/conn.php';

if(isset($_POST['payment_submit'])) {

	$id = $_SESSION['user_id'];
	// Variables
	$tracking_number = $_POST['tracking_number'];
	$full_name = $_POST['full_name'];
	$payment_method = $_POST['payment_method'];
	$reference_num = $_POST['reference_num'];


	// Select User if Existed
	$select_user_payment = "SELECT * FROM payment WHERE oauth_id = '$id'";
	$select_user_payment_result = mysqli_query($conn, $select_user_payment);

	// Check
	if($select_user_payment_result -> num_rows > 0) {
    header("Location: ../clearance_payment.php?error= User already Requested");
	  } else {
	   $sql = "INSERT INTO payment (oauth_id, tracking_number, full_name, payment_method, reference_number) VALUES ('$id','$tracking_number', '$full_name', '$payment_method', '$reference_num')";
	   $query= mysqli_query($conn,$sql);
	   		$_SESSION['1st_phase'] = "Active";
            $_SESSION['2nd_phase'] = "Active";
	   header("Location: ../clearance_fill_up.php");
}
}

?>