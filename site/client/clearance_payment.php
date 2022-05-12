<?php 
    session_start();
    include '../includes/conn.php';
    include '../includes/session.php';


    if($_SESSION['2nd_phase'] == "Active") {
    header("location:clearance_fill_up.php");
}

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
            <a href="features_page.php"><h2>Clearance</h2></a><h2>>&nbsp;&nbsp;&nbsp;Payment</h2>
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

          <!-- Generate Random Tracking Number -->
          <?php 
          $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
           
          function generate_string($input, $strength = 16) {
              $input_length = strlen($input);
              $random_string = '';
              for($i = 0; $i < $strength; $i++) {
                  $random_character = $input[mt_rand(0, $input_length - 1)];
                  $random_string .= $random_character;
              }
           
              return $random_string;
          }
          ?>
          <div class="clearance__payment__box__right">
            <div class="clearance__payment__content__right">
              <form action="functions/clearance_payment_process.php" method="post" enctype='multipart/form-data'>
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
                Tracking Number:<br><br>
                <input type="text" name="tracking_number" value="<?php echo generate_string($permitted_chars, 20); ?>" style="text-align: center;" readonly>
                <span class="underline"></span>
                </div>
                <br>
                <div class="inputbox-content">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <span class="underline"></span>
                </div>
                <br>
                <div class="inputbox-content">
                <select name="payment_method" id="payment_method" class="method" required>
                  <option selected="true" disabled="disabled">Select Payment Method</option>
                  <option>Cash on Pick Up</option>
                  <option>Gcash</option>
                </select>
                <span class="underline"></span>
                </div>
                <br>
                <div class="inputbox-content gcash" id="showGcash">
                Reference Number from Gcash:<br><br>
                <input type="text" name="reference_num" placeholder="Reference Number">
                <span class="underline"></span>
                </div>
                <br>
                <div class="inputbox-content">
                  <div class="buttons">
                    <button type="submit" class="btn" name="payment_submit"><span>Proceed</span></button>
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
	<?php include 'includes/footer.php';?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>


<script type="text/javascript">
  // Display Ref Number if Gcash Selected
  $(document).ready(function() {
  $("select.method").change(function() {
    var selectedCountry = $(".method option:selected").text();
    if (selectedCountry == "Cash on Pick Up") {
        $("#showGcash").hide();
    } else if (selectedCountry == "Gcash") {
        $("#showGcash").show();
    }
  });
});
</script>