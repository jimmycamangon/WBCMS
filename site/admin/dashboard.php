<?php 

include '../includes/conn.php';
include 'includes/session.php';

// Select Students
$select_student = "SELECT resident FROM users WHERE resident = 'Student'";
$select_student_result = mysqli_query($conn,$select_student);
$student_result = $select_student_result->num_rows;

// Select Unemployed
$select_unemployed = "SELECT resident FROM users WHERE resident = 'UnEmployed'";
$select_unemployed_result = mysqli_query($conn,$select_unemployed);
$unemployed_result = $select_unemployed_result->num_rows;

// Select Employed
$select_employed = "SELECT resident FROM users WHERE resident = 'Employed'";
$select_employed_result = mysqli_query($conn,$select_employed);
$employed_result = $select_employed_result->num_rows;

// Select Senior
$select_senior = "SELECT resident FROM users WHERE resident = 'Senior Citizen'";
$select_senior_result = mysqli_query($conn,$select_senior);
$senior_result = $select_senior_result->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
      <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<title>Dashboard</title>
</head>
<body>
	<?php include 'includes/nav.php';?>

	<div class="top__nav2">
		<i class='bx bxs-dashboard' ></i> &nbsp;&nbsp;<h1>Dashboard</h1>
	</div>

<div class="main">
	<div class="left__container">
		<div class="box">1</div>
		<div class="box">2</div>
		<div class="box">3</div>
		<div class="box">4</div>
	</div>
	<div class="right__container">
		<h1>Right</h1>
	</div>
</div>

</body>
</html>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>