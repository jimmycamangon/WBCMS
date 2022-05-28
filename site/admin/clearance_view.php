<?php 

include '../includes/conn.php';
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link  type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" media="screen"
  href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  <title>Dashboard</title>
</head>
<body>
  <?php include 'includes/nav.php'; ?>
  <section class="home-section">
    <div class="home-content">
      <div class="top-left">
        <i class='bx bx-menu' ></i>
        <a class="navbar-brand" href="#"> Dashboard </a>
      </div>

      <div class="top__nav">
        <div class="top__content">
          <div class="top__profile">
            <img src="<?php if(!isset($_SESSION['picture'])) { echo '../assets/img/alt-image.png'; } else { echo $_SESSION["picture"]; } ?>" alt="Image">
            <h1><?php echo $_SESSION['user_name'] ?></h1></div>


            <!-- Drop Down -->
            <div class="apto-dropdown-wrapper">
             <button class="apto-trigger-dropdown" id="notificationLink" onclick = "removeNotification()">
               <span id="notification_count"></span> <i class='bx bxs-bell'></i>
             </button>
             <div class="dropdown-menu-notif" data-selected="logout">
               <span id="noti_message"></span>
             </div>
           </div>

           <!-- Drop Down -->
           <div class="apto-dropdown-wrapper">
             <button class="apto-trigger-dropdown">
              <i class='bx bx-caret-down'></i>
            </button>
            <div class="dropdown-menu" data-selected="logout">

              <a href="../logout.php"><button type="button" value="logout" tabindex="0" class="dropdown-item"><i class='bx bxs-lock-alt' ></i>
               Change Password
             </button></a>

             <a href="../logout.php"><button type="button" value="logout" tabindex="0" class="dropdown-item"><i class='bx bxs-exit bx-rotate-180' ></i>
               Logout
             </button></a>
           </div>
         </div>


       </div>
     </div>

   </div>



   <div class="main-content">

    <br>

    <style type="text/css">
      h3 {
        font-size: 1.6rem;
      }
      h4, h5{
        color: #1da1f2;
        font-weight: bold;
        font-size: 1.5rem;
      }
    </style>
    <div class="row ">
      <div class="col-lg-12 col-md-12">
        <div class="card" style="min-height: 485px">
          <div class="container">
            <br>
            <div class="row">
              <?php
              $oauth_id = $_GET['oauth_id'];

              $view = "SELECT clearance.oauth_id, clearance.sur_name, clearance.first_name, clearance.middle_name, clearance.full_address, clearance.precint_number, clearance.purpose, clearance.request_status, clearance.created_at, payment.oauth_id, payment.full_name, payment.tracking_number, payment.payment_method, payment.reference_number FROM clearance INNER JOIN payment ON clearance.oauth_id = payment.oauth_id WHERE clearance.oauth_id = '$oauth_id' AND payment.oauth_id = '$oauth_id'";
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
                  $clearance_status = $row['request_status'];
                        // Payment Variables
                  $payment_full_name = $row['full_name'];
                  $payment_tracking_number = $row['tracking_number'];
                  $payment_method = $row['payment_method'];
                  $payment_reference_number = $row['reference_number'];
                  $created_at = $row['created_at'];
                  ?>

                  <?php if($row['request_status'] == 'Pending'){?>
                    <div class="col">
                      <br>
                      <h3 style="color:#000 !important;">Payment:</h3>
                      <br>
                      <h4>Full Name:</h4> <h3><?php echo $payment_full_name ?></h3>
                      <h4>Tracking Number:</h4><h3><?php echo $payment_tracking_number ?></h3>                 
                      <h4>Payment Method:</h4> <h3><?php echo $payment_method ?></h3>
                      <h4>Reference Number:</h4> <h3><?php echo $payment_reference_number ?></h3>
                      <br>
                      <?php if($row['request_status'] == 'Pending' ) {  ?>
                       Submit as: <a href="functions/process_clearance.php?oauth_id=<?php echo $oauth_id ?>" class="btn btn-primary">In Process</a><br><br>
                     <?php }?>
                   </div>

                   <div class="col">
                    <h3 style="color:#000 !important;">Clearance Form Request:</h3>
                    <h5>Surname:</h5><h3><?php echo $clearance_surname ?></h3>
                    <h5>First Name:</h5> <h3><?php echo $clearance_first_name ?></h3>
                    <h5>Middle Name:</h5><h3><?php echo $clearance_middle_name ?></h3>
                    <h5>Full Address:</h5> <h3><?php echo $clearance_full_address ?></h3>
                    <h5>Precint Number:</h5> <h3><?php echo $clearance_precint_number ?></h3>
                    <h5>Purpose:</h5> <h3><?php echo $clearance_purpose ?></h3>
                    <h5>Status:</h5> <h3><?php echo $clearance_status ?></h3>
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

             echo 'Since: '.TimeAgo($date, date("Y-m-d H:i:s")). '<hr>';
             ?> 
             <br>
           <?php  } if($row['request_status'] == 'Processing'){?>
            <div class="col">
              <h3 style="color:#000 !important;">Schedule:</h3><br>
              <form action="functions/submit_clearance_notif.php?oauth_id=<?php echo $oauth_id?>" method="POST">
                <div class="form-group row">
                  <label for="inputEmail3">Subject:</label>
                    <input type="text" class="form-control" name="subject">
                </div>
                <div class="form-group row">
                  <label for="inputPassword3">Description:</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="form-group row">
                  <label for="inputPassword3">Date and Time:</label>
                    <input type="datetime-local" class="form-control" name="date_time">
                </div>
                <div class="form-group row">
                    <button type="submit" name="clearance_submit" class="btn btn-primary" value="<?php echo $row['oauth_id']; ?>">Notify User</button>
                </div>
              </form>
            </div>
             <div class="col">
                    <h3 style="color:#000 !important;">Clearance Form Request:</h3><br>
                    <h5>Surname:</h5><h3><?php echo $clearance_surname ?></h3>
                    <h5>First Name:</h5> <h3><?php echo $clearance_first_name ?></h3>
                    <h5>Middle Name:</h5><h3><?php echo $clearance_middle_name ?></h3>
                    <h5>Full Address:</h5> <h3><?php echo $clearance_full_address ?></h3>
                    <h5>Precint Number:</h5> <h3><?php echo $clearance_precint_number ?></h3>
                    <h5>Purpose:</h5> <h3><?php echo $clearance_purpose ?></h3>
                    <h5>Status:</h5> <h3><?php echo $clearance_status ?></h3>
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

             echo 'Since: '.TimeAgo($date, date("Y-m-d H:i:s")). '<hr>';
             ?> 

          <?php } if($row['request_status'] == 'To_Claim') {?>

  <div class="col">
                      <br>
                      <h3 style="color:#000 !important;">Payment:</h3>
                      <br>
                      <h4>Full Name:</h4> <h3><?php echo $payment_full_name ?></h3>
                      <h4>Tracking Number:</h4><h3><?php echo $payment_tracking_number ?></h3>                 
                      <h4>Payment Method:</h4> <h3><?php echo $payment_method ?></h3>
                      <h4>Reference Number:</h4> <h3><?php echo $payment_reference_number ?></h3>
                      <br>
                      <?php if($row['request_status'] == 'Pending' ) {  ?>
                       Submit as: <a href="functions/process_clearance.php?oauth_id=<?php echo $oauth_id ?>" class="btn btn-primary">In Process</a><br><br>
                     <?php }?>
                   </div>

                   <div class="col">
                    <h3 style="color:#000 !important;">Clearance Form Request:</h3>
                    <h5>Surname:</h5><h3><?php echo $clearance_surname ?></h3>
                    <h5>First Name:</h5> <h3><?php echo $clearance_first_name ?></h3>
                    <h5>Middle Name:</h5><h3><?php echo $clearance_middle_name ?></h3>
                    <h5>Full Address:</h5> <h3><?php echo $clearance_full_address ?></h3>
                    <h5>Precint Number:</h5> <h3><?php echo $clearance_precint_number ?></h3>
                    <h5>Purpose:</h5> <h3><?php echo $clearance_purpose ?></h3>
                    <h5>Status:</h5> <h3><?php echo $clearance_status ?></h3>
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

             echo 'Since: '.TimeAgo($date, date("Y-m-d H:i:s")). '<hr>';
             ?> 
          <?php  } } }?>
        </div>
      </div>

    </div>
  </div>

</div>



<footer class="footer">
  <div class="container-fluid">

    <div class="col-md-7">
     <p class="copyright d-flex justify-content-end"> @CCS
      All rights Reserved.
    </p>
  </div>
</div>
</div>
</div>


</div>
</section>
<script type="text/javascript" src="notif.js"></script>
<script type="text/javascript" src="all.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
