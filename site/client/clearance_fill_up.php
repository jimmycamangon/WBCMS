<?php 
    session_start();
    include '../includes/conn.php';
    include '../includes/session.php';

if($_SESSION['1st_phase']!="Active") {
    header("location:features_page.php");
}
if($_SESSION['2nd_phase']!="Active") {
    header("location:features_page.php");
}
// Resident ID Variable
$id = $_SESSION['user_id'];


// Cancel Function

if(isset($_POST['cancel'])) {


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
  <title>Fill Up</title>
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/fill_up.css">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <!-- Top -->
  <div class="top__nav">
          <div class="top__content">
            <div class="top__notif"><i class='bx bxs-bell'></i></div>
            <div class="top__profile">
              <img src="<?php if(!isset($_SESSION['picture'])) { echo '../assets/img/alt-image.png'; } else { echo $_SESSION["picture"]; } ?>" alt="Image">
              <h1><?php echo $_SESSION['user_fname']; ?> <?php echo $_SESSION['user_lname'] ?></h1></div>
             

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


<!-- Fill Up Page -->
        <div class="top__nav2">
          <div class="top__content2">
            <a href="features_page.php"><h2>Clearance</h2></a><h2>>&nbsp;&nbsp;&nbsp;Payment&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Fill Up</h2>
          </div>
        </div>


        <div class="fillup__payment__container">
          <div class="fillup__payment__box__left">
            <div class="fillup__payment__content__left">
              <?php

              $select_user = "SELECT * FROM payment WHERE oauth_id = '$id'";
              $select_user_result = mysqli_query($conn, $select_user);

              while ($row = mysqli_fetch_array($select_user_result)) {
               ?>
                <i class='bx bx-error-circle'></i><br><br>
                <p>Tracking Number: <br><span><?php echo $row['tracking_number'];?></span></p><br>
                <p>Payment Method: <br><span><?php echo $row['payment_method'];?></span></p>
            <?php }?>
            </div>

      <input type="checkbox" id="check" class="check">
      <div class="background"></div>

<!-- Pop up Message -->
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



          </div>
          <div class="fillup__payment__box__right">
            <div class="fillup__payment__content__right">
              <form action="functions/clearance_fill_up_process.php" method="post" enctype='multipart/form-data' class="form">
                <div class="inputbox-content">
                  <?php if (isset($_GET['error'])) { ?>
                    <div class="message">
                      <p class="error"> <?php echo $_GET['error']; ?><a class="close" style="cursor:pointer; position: absolute;right: 0.25rem; top: 0.125rem;">&times;</a></p>
                    </div>
                  <?php } ?>
                  <?php if (isset($_GET['success'])) { ?>
                   <p class="success"><?php echo $_GET['success']; ?>
                   <a class="close_success" style="cursor:pointer; position: absolute;right: 0.25rem; top: 0.125rem;">&times;</a></p>
                 <?php } ?>
                </div>
                <div class="inputbox-content">
                <input type="text" name="sur_name">
                <span class="underline"></span>
                <label>Surname:</label>
                </div>
                <div class="inputbox-content">
                <input type="text" name="first_name">
                <span class="underline"></span>
                <label>First Name:</label>
                </div>
                <div class="inputbox-content">
                <input type="text" name="middle_name">
                <span class="underline"></span>
                <label>Middle Name:</label>
                </div>
                <div class="inputbox-content">
                <input type="text" name="full_address">
                <span class="underline"></span>
                <label>Full Address:</label>
                </div>
                <div class="inputbox-content">
                <input type="text" name="precint_number"><span class="underline"></span>
                <label>Precint Number:</label>
                </div>
                <div class="inputbox-content">
                <select name="payment_method" id="payment_method">
                  <option selected="true" disabled="disabled">Select Purpose</option>
                  <option>Employment</option>
                  <option>Travel Abroad</option>
                  <option>Local Purpose</option>
                  <option>Bank Remittance</option>
                  <option>License Renewal</option>
                  <option>Tricycle Franchise</option>
                  <option>Hospital</option>
                </select>
                <span class="underline"></span>
                </div>

                <div class="inputbox-content">
                  <div class="buttons">
                    <label  class="btn" for="check"><span>Cancel</span></label><br><br>
                  </div>         
                </div>

                <div class="inputbox-content">
                <div class="buttons">
                    <button type="submit" class="btn" name="clearance_submit"><span>Proceed</span></button>      
                      </div> 
                </div>
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
  <?php include 'includes/footer.php';?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>