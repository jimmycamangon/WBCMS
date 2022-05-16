<?php 
    session_start();
    include '../includes/conn.php';

    // Check if the student is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["logged_in_as_admin"]) && $_SESSION["logged_in_as_admin"] === true){
        header("location: dashboard.php");
        exit;
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
	<title>Admin Login</title>
</head>
<body>
	

 <div class="login-container"  align="center">
      <form action="functions/admin_login_process.php" method="post">
      	<br>
      <div class="login-container-head">
      	<img src="../assets/img/Logo.png">
      </div>	
      <br>
      <h2>Admin Login</h2>
      <br>
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
           <p class="error"><?php echo $_SESSION['error']; ?></p>
        <?php
            unset($_SESSION['error']);
            }
        ?>
      <br>
      <div class="inputbox-content">
      <input type="text" name="uname" placeholder="User Name">
      <span class="underline"></span>
      </div>
      <br>
      <div class="inputbox-content">
      <input type="password" name="password" placeholder="Password">
      <span class="underline"></span>
      </div>
      <br>
      <center>
      <a href="../index.php"><button type="button" class="back"><span>Back</span></button></a>
      <button type="submit" class="login"><span>Login</span></button>
      </center>
      <br>
     </form>
</div>
</body>
</html>