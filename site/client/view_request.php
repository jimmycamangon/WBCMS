<?php 
session_start();
include '../includes/conn.php';
include '../includes/session.php';

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Home</title>
 <link rel="stylesheet" type="text/css" href="css/home.css">
 <link rel="stylesheet" type="text/css" href="css/progress.css">
 <link rel="stylesheet" type="text/css" href="css/news.css">
 <link rel="stylesheet" type="text/css" href="css/view.css">
 <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
 <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

  <?php include 'includes/nav.php';?>
  <!-- Home -->
  <div class="top__nav2">
    <div class="top__content2">
      <h2>Home</h2>

      <br>
      <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
        <p class="success"><?php echo $_SESSION['success_message']; ?></p>
        <?php
        unset($_SESSION['success_message']);
      }
      ?>
    </div>
  </div>

  <span class="msg-icn" id="msg-icn">    </span>

  <!-- Container -->
  <div class="view__container">

    <?php
    $oauth_id = $_GET['oauth_id'];

    $view = "SELECT clearance.oauth_id, clearance.sur_name, clearance.first_name, clearance.middle_name, clearance.full_address, clearance.precint_number, clearance.purpose, clearance.status, clearance.created_at, payment.oauth_id, payment.full_name, payment.tracking_number, payment.payment_method, payment.reference_number FROM clearance INNER JOIN payment ON clearance.oauth_id = payment.oauth_id WHERE clearance.oauth_id = '$oauth_id' AND payment.oauth_id = '$oauth_id'";
    $view_result = mysqli_query($conn, $view);

    if ($view_result->num_rows > 0) {
      while ($row = $view_result->fetch_assoc()) {
        $oauth_id = $row['oauth_id'];
                       // Clearance Variables
        $clearance_surname = $row['sur_name'];
        $clearance_first_name = $row['first_name'];
        $clearance_middle_name = $row['middle_name'];
        $clearance_full_address = $row['full_address'];
        $clearance_precint_number = $row['precint_number'];
        $clearance_purpose = $row['purpose'];
        $clearance_status = $row['status'];
                        // Payment Variables
        $payment_full_name = $row['full_name'];
        $payment_tracking_number = $row['tracking_number'];
        $payment_method = $row['payment_method'];
        $payment_reference_number = $row['reference_number'];
        $created_at = $row['created_at'];

        ?>

        <div class="view__box">
          <div class="view__box__left">
           <h2 style="color:#000 !important;">Payment:</h2>
           <br>
           Full Name:<h2><?php echo $payment_full_name ?></h2><br>
           Tracking Number:<h2><?php echo $payment_tracking_number ?></h2><br>                 
           Payment Method: <h2><?php echo $payment_method ?></h2><br>
           Reference Number: <h2><?php echo $payment_reference_number ?></h2><br>
         </div>
         <div class="view__box__right">
          <h3 style="color:#000 !important;">Clearance Form Request:</h3><br>
                    <h5>Surname:</h5><h2><?php echo $clearance_surname ?></h2>
                    <h5>First Name:</h5> <h2><?php echo $clearance_first_name ?></h2>
                    <h5>Middle Name:</h5><h2><?php echo $clearance_middle_name ?></h2>
                    <h5>Full Address:</h5> <h2><?php echo $clearance_full_address ?></h2>
                    <h5>Precint Number:</h5> <h2><?php echo $clearance_precint_number ?></h2>
                    <h5>Purpose:</h5> <h2><?php echo $clearance_purpose ?></h2>
                    <h5>Status:</h5> <h2><?php echo $clearance_status ?></h2>
                    <br>
                    <?php 
                    if(function_exists("TimeAgo")){
               } else {   //Creating Function
                function TimeAgo ($oldTime, $newTime) {
                 $timeCalc = strtotime($newTime) - strtotime($oldTime);
                 if ($timeCalc >= (60*60*24*30*12*2)){
                   $timeCalc = intval($timeCalc/60/60/24/30/12) . " years ago";
                 }else if ($timeCalc >= (60*60*24*30*12)){
                   $timeCalc = intval($timeCalc/60/60/24/30/12) . " year ago";
                 }else if ($timeCalc >= (60*60*24*30*2)){
                   $timeCalc = intval($timeCalc/60/60/24/30) . " months ago";
                 }else if ($timeCalc >= (60*60*24*30)){
                   $timeCalc = intval($timeCalc/60/60/24/30) . " month ago";
                 }else if ($timeCalc >= (60*60*24*2)){
                   $timeCalc = intval($timeCalc/60/60/24) . " days ago";
                 }else if ($timeCalc >= (60*60*24)){
                   $timeCalc = " Yesterday";
                 }else if ($timeCalc >= (60*60*2)){
                   $timeCalc = intval($timeCalc/60/60) . " hours ago";
                 }else if ($timeCalc >= (60*60)){
                   $timeCalc = intval($timeCalc/60/60) . " hour ago";
                 }else if ($timeCalc >= 60*2){
                   $timeCalc = intval($timeCalc/60) . " minutes ago";
                 }else if ($timeCalc >= 60){
                   $timeCalc = intval($timeCalc/60) . " minute ago";
                 }else if ($timeCalc > 0){
                   $timeCalc .= " seconds ago";
                 }
                 return $timeCalc;
               }
             }
             $date = $row['created_at'];

             echo 'Since: <h2>'.TimeAgo($date, date("Y-m-d H:i:s")).'</h2>';
             ?> </div>

       </div>
     <?php } } ?>


   </div>
   <?php include 'includes/footer.php'; ?>
 </body>
 </html>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="all.js"></script>
 <script type="text/javascript" src="notif.js"></script>