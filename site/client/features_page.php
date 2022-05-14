<?php 
    session_start();
    include '../includes/conn.php';
    include '../includes/session.php';
    

$id = $_SESSION['user_id'];

// Cancel Function

if(isset($_POST['cancel'])) {


// Delete data from clearance
  $delete_clearance_request = "DELETE FROM clearance WHERE oauth_id = '$id'";
  $delete_clearance_request_result = mysqli_query($conn, $delete_clearance_request);
// Delete data from payment
  $delete_payment_request = "DELETE FROM payment WHERE oauth_id = '$id'";
  $delete_payment_request_result = mysqli_query($conn, $delete_payment_request);
    $_SESSION['1st_phase'] = "inActive";
    $_SESSION['2nd_phase'] = "inActive";
    $_SESSION['success_message'] = "Request Cancelled Successfully";
    header("Location: index.php");

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Features</title>
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/feature.css">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>


	<?php include 'includes/nav.php';?>


<!-- Features Page -->
        <div class="top__nav2">
          <div class="top__content2">
            <h2>Features and Services</h2>

          </div>
        </div>

        <?php 

        // If user click the button = start the session

        if(isset($_POST['start'])) {
          $_SESSION['1st_phase'] = "Active";
          header("Location: clearance_payment.php");
        }

        ?>
        <div class="feature__container">
          <div class="feature__box">
          	<div class="feature__head">
          		<img src="../assets/img/SVG/Clearance_Image.png">
          	</div>
          	<div class="feature__content">
          		<h1>Clearance</h1>
          		<br>
          		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          		tempor</p>
          		<br>
       <div class="feature__buttons">
              <!-- Check if user already requested -->
              <?php 

              $result = mysqli_query($conn,"SELECT status FROM clearance WHERE oauth_id = '$id'");
              $row  = mysqli_fetch_assoc($result);

              if($result -> num_rows == 1 AND $row['status'] == 'Pending') {?>
                <div class="buttons"><label  class="btn" for="check" style="background: #E74B37;"><span>Cancel</span></label></div><p class="pending">Request Pending</p>

              <?php } if($result -> num_rows == 1 AND $row['status'] == 'Processing') {?>
               <p class="pending">Request in Process</p>
              <?php } if($result -> num_rows == 0) { ?>
          		<form action="" method="POST">
                <button type="submit" class="update" name="start"><span> Get Started </span></button>  
              </form>
              <?php }?>
            </div>
          	</div>
          </div>

      </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<?php include 'includes/footer.php';?>


<!-- Pop up Message -->
<input type="checkbox" id="check" class="check">
<div class="background"></div>
 <div class="alert_box">
        <div class="icon">
         <i class='bx bx-error-circle'></i>
        </div>
        <header>Are you sure want to cancel?</header>
        <p>Everything will be reset including payment.</p>
          <form action="" method="POST" class="btns">
          <button href="clearance_fill_up.php" onclick="location.href='clearance_fill_up.php'" class="btn" type="button" style="background: #E74B37;"><span>Cancel</span></button>
          <button type="submit" for="check" class="btn" name="cancel" id="cancel_queue" href="javascript:void(0)" value="Cancel"><span>Confirm</span>
          </form>
  </div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>