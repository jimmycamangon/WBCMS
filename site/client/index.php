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
        <div class="home__container">

          <!-- Box num 1 -->
          <div class="home__box">
            <div class="home__box1__container">
              <div class="left__box1">
                <img src="<?php if(!isset($_SESSION['picture'])) { echo '../assets/img/alt-image.png'; } else { echo $_SESSION["picture"]; } ?>" alt="Image"><br>
                <?php 
                $id=$_SESSION['user_id'];
                $result = mysqli_query($conn,"SELECT status FROM users WHERE oauth_id = $id");
                $row  = mysqli_fetch_array($result);
                  if($row['status'] == 'not_verified') {?>
                    <div class="message__not__verified"><i class='bx bxs-error-circle' ></i><h5>Account not Verified</h5></div>
                  <?php } if($row['status'] == 'verified') { ?>
                    <div class="message__verified"><i class='bx bxs-check-circle' ></i><h5>Account Verified</h5></div>
                  <?php } ?>
              </div>
              <div class="right__box1">
                <div class="right__box1__head">
                    <?php echo $_SESSION['user_fname']; ?> <?php echo $_SESSION['user_lname'] ?>
                </div>
                <div class="right__box1__content">
                    <?php if(!isset($_SESSION['full_address'])) { ?><i class='bx bxs-map'></i>&nbsp;&nbsp;&nbsp;None<?php } else {?> <i class='bx bxs-map'></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['full_address'];?><?php } ?><br><br>

                    <?php if(!isset($_SESSION['email'])) { ?><i class='bx bxs-envelope' ></i>&nbsp;&nbsp;&nbsp;None<?php } else {?> <i class='bx bxs-envelope' ></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['email'];?><?php } ?><br><br>

                    <?php if(!isset($_SESSION['full_address'])) { ?><i class='bx bxs-phone' ></i>&nbsp;&nbsp;&nbsp;None<?php } else {?><i class='bx bxs-phone' ></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['contact'];?><?php } ?>
                </div>
               <button class="update" onclick="location.href='verify.php'"><span> Update </span></button>
              </div>
            </div>
          </div>


          <!-- Box Num 2 -->
          <div class="home__box">
            <div class="home__box2__container">
               <?php 
                $id=$_SESSION['user_id'];
                $result = mysqli_query($conn,"SELECT status FROM users WHERE oauth_id = $id");
                $row  = mysqli_fetch_array($result);
                  if($row['status'] == 'not_verified') {
                      ?>
                        <div class="left__box2"> <img src="../assets/img/SVG/Greet2.png" alt="Image"></div>
                        <div class="right__box2">
                          <p>Kindly complete all your information including 1 valid id to access all system's feature.</p>
                          <br>
                          <a href="verify.php"><button class="Verify"><span> Verify </span></button></a>
                        </div>
                  <?php } if($row['status'] == 'processing') { ?>
                          <div class="left__box2"> <img src="../assets/img/SVG/processing2.png" id="center_logo" alt="Image"></div>
                          <div class="right__box2">
                          <p>Your account request verification is now in process</p>
                          <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                          </div>
                  <?php } if($row['status'] == 'verified') { ?>
                         <div class="left__box2"> <img src="../assets/img/Logo.png" id="center_logo" alt="Image"></div>
                        <div class="right__box2">
                          <h2>Welcome to WBCMS.</h2>
                        </div>
                  <?php } ?>
            </div>
          </div>


          <!-- Box Num 3 -->
          <div class="home__box">
          <div class="home__box__head3">
            <h1>News</h1>
          </div>  
          <div class="home__box3__container3">
            <?php 
              $id = $_SESSION['user_id'];
              $select_news = "SELECT * FROM updates ORDER BY id ASC LIMIT 6";
              $select_news_result = mysqli_query($conn, $select_news);

                 if ($select_news_result -> num_rows > 0) {
                        while ($news_row = $select_news_result->fetch_assoc()) {
                          ?>
                           <div class="card__update">
                             <img src="<?php echo '../assets/img/'.$news_row['img'].''?>" class="card__image" alt="Image">
                            <div class="card__overlay">        
                              <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
                                <img class="card__thumb" src="../assets/img/SVG/admin-icon.png" alt="" />
                                <div class="card__header-text">
                                  <h3 class="card__title">Admin</h3>

                                  <span class="card__status">


                                <!-- Time Ago Function -->
                                    <?php 
                                 if(function_exists("TimeAgo")){
                                  } else {                           //Creating Function
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
                                  $date = $news_row['created_at'];

                                  echo TimeAgo($date, date("Y-m-d H:i:s"));
                                ?>
                                    

                                  </span>
                                </div>
                              </div>
                              <p class="card__description"><?php echo $news_row['title'];?></p>
                              <a href="<?php echo $news_row['link'];?>" class="card__link">Read more</a>
                            </div>
                          </div>
                        <?php }
                         } else {
                            echo "<div style='display:flex;justify-content:center;align-items:center;'><img style='width:300px;' src='../assets/img/SVG/No Data Update.png'></div>";
                    }?>
          </div>
          </div>

          <!-- Box Num 4 -->
          <div class="home__box">
            <?php 
              $query = "SELECT clearance.status, clearance.oauth_id, requests.oauth_id, requests.type FROM clearance INNER JOIN requests ON clearance.oauth_id = requests.oauth_id WHERE requests.oauth_id = '$id' ORDER BY requests.id ASC LIMIT 3";
              $result = mysqli_query($conn, $query);

                 if ($result -> num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          ?>
              <section class="step__progress__container">
               <h1><?php echo $row['type'];?> Request Status</h1>
                    <ul class="step-wizard-list">
                        <li class="step-wizard-item">
                            <span class="progress-count">1</span>
                            <span class="progress-label">To Pay</span>
                        </li>
                       <?php if($row['status'] == 'Pending') { ?>
                        <li class="step-wizard-item current-item">
                            <span class="progress-count">2</span>
                            <span class="progress-label">Pending</span>
                        </li>
                       <?php } else { ?>
                        <li class="step-wizard-item">
                            <span class="progress-count">2</span>
                            <span class="progress-label">Pending</span>
                        </li>
                       <?php }?>
                       <?php if($row['status'] == 'Processing') { ?>
                        <li class="step-wizard-item current-item">
                            <span class="progress-count">3</span>
                            <span class="progress-label">Processing</span>
                        </li>
                      <?php } else { ?>
                        <li class="step-wizard-item">
                            <span class="progress-count">3</span>
                            <span class="progress-label">Processing</span>
                        </li>
                      <?php } ?>
                      <?php if($row['status'] == 'To_Claim') { ?>
                        <li class="step-wizard-item current-item">
                            <span class="progress-count">4</span>
                            <span class="progress-label">To Claim</span>
                        </li>
                      <?php } else { ?>
                        <li class="step-wizard-item">
                            <span class="progress-count">4</span>
                            <span class="progress-label">To Claim</span>
                        </li>
                      <?php } ?>
                    </ul>
                <button class="update"><span>View More</span></button>
              </section>
                        <?php }
                        } else {
                      echo "<div style='display:flex;justify-content:center;align-items:center;'><img style='width:300px;' src='../assets/img/SVG/No Data.png'></div>";
                    }
            ?>
          </div>

        </div>

        <?php include 'includes/footer.php'; ?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>
<script type="text/javascript" src="notif.js"></script>