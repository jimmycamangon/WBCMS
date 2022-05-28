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


    <div class="row ">
                <div class="col-lg-12 col-md-12">
                  <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                      <h4 class="card-title">User Verification Request</h4>
                    </div>
                    <div class="container">
                     <div class="row">
                      <?php
                    $id = $_GET['id'];

                    $view = "SELECT * FROM notifications where id = '$id'";
                    $view_result = mysqli_query($conn, $view);

                    if ($view_result->num_rows > 0) {
                      while ($row = $view_result->fetch_assoc()) {
                        $id = $row['id'];
                        $oauth_id = $row['oauth_id'];
                        $subject = $row['subject'];
                        $description = $row['description'];
                        $created_at = $row['created_at'];
                       ?>
                        <div class="col">
                          <br>
                          <h3><?php echo $description ?></h3>
                          <h3>Name: <?php echo $name ?></h3>
                          <h3>Type: <?php echo $type ?></h3>
                        </div>
                        <div class="col">
                          <h3><?php echo $description ?></h3>
                          <h3>Name: <?php echo $name ?></h3>
                          <h3>Type: <?php echo $type ?></h3>
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


                          <?php if($row['type'] == 'Guard' || $row['type'] == 'Cashier Staff' || $row['type'] == 'Registrar Staff' ) {  ?>
                          <a href="verify_staff.php?name=<?php echo $name ?>" class="btn btn-primary">Verifiy Staff</a>
                        <?php } if($row['type'] == 'student') {?>
                          <a href="verify_student.php?name=<?php echo $name ?>" class="btn btn-primary">Verifiy Student</a>
                        <?php }?>
                        </div>
                    <?php } } else {
                      echo 'View Notification First';
                    }?>
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
