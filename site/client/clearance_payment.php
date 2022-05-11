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
  <title>Payment</title>
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/payment.css">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<?php include 'includes/nav.php';?>


<!-- Payment Page -->
        <div class="top__nav2">
          <div class="top__content2">
            <h2>Clearance > Payment</h2>
          </div>
        </div>


        <div class="clearance__payment__container">
          <div class="clearance__payment__box__left">
          	<div class="clearance__payment__head__left">
          		<img src="../assets/img/Logo.png">
          	</div>
          	<div class="clearance__payment__content__left">
             <p>Fee: 100 PHP</p>
          	 <p>Gcash#: 09365220532</p>
          	</div>
          </div>

          <div class="clearance__payment__box__right">
            <div class="clearance__payment__content__right">
              <form action="functions/login_process.php" method="post">
                <div class="inputbox-content">
                Tracking Number:<br><br>
                <input type="text" name="uname" value="WS2WEWSAD3123ASDASD" disabled>
                <span class="underline"></span>
                </div>
                <br>
                <div class="inputbox-content">
                <input type="text" name="fullname" placeholder="Full Name" value="<?php echo $_SESSION['user_fname']; ?> <?php echo $_SESSION['user_lname'] ?>">
                <span class="underline"></span>
                </div>
                <br>
                <br>
               </form>
            </div>
          </div>

        </div>

	<?php include 'includes/footer.php';?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>