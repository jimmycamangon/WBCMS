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
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        
<?php include 'includes/nav.php';?>
<!-- Home -->
        <div class="top__nav2">
          <div class="top__content2">
            <h2>Home</h2>

          </div>
        </div>
        <!-- Container -->
        <div class="home__container">
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
                          <p>Kindly complete all the information including 1 valid id to access all system's feature.</p>
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
          <div class="home__box"></div>
          <div class="home__box"></div>

        </div>

        <?php include 'includes/footer.php'; ?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>