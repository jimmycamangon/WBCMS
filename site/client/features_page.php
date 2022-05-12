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
          		<form action="" method="POST">
                <button type="submit" class="update" name="start"><span> Get Started </span></button>  
              </form>
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
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>