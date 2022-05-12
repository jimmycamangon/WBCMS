<?php 
  session_start();
  include '../includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
  <link rel="stylesheet" href="css/verify.css" />
  <script src="all.js" defer></script>
  <title>Verification</title>
</head>

<body>

<?php
$id = $_SESSION['user_id'];

if(isset($_POST['img_submit'])){
  $valid_id = $_POST["valid_id"];
  $img_name=$_FILES['img_upload']['name'];
  $tmp_img_name=$_FILES['img_upload']['tmp_name'];
  $folder='uploads/';
  move_uploaded_file($tmp_img_name,$folder.$img_name);

  $select_data = "SELECT * FROM verification WHERE oauth_id = '$id'";
  $select_data_result = mysqli_query($conn, $select_data);

  if($select_data_result -> num_rows > 0) {
    header("Location: verify.php?error= User already Requested");
  } else {
   $sql = "INSERT INTO verification (oauth_id, valid_id, img_upload) VALUES ('$id','$valid_id', '$img_name')";
   $query= mysqli_query($conn,$sql);
   header("Location: verify.php?success= Verification Requested Successfully");
 }
}



?>


  <form action='' method='POST' class="form" enctype='multipart/form-data'>
      <div class="head">
    <img src="../assets/img/Logo.png">
  </div>
    <h1 class="text-center">Verification</h1>
    <!-- Progress bar -->
    <div class="progressbar">
      <div class="progress" id="progress"></div>

      <div class="progress-step progress-step-active" data-title="ID Type"></div>
      <div class="progress-step" data-title="Valid ID"></div>

    </div>

    <!-- Steps -->
    <?php if (isset($_GET['error'])) { ?>
      <div class="message">
        <p class="error"> <?php echo $_GET['error']; ?><a class="close" style="cursor:pointer; position: absolute;right: 0.25rem; top: 0.125rem;">&times;</a></p>
      </div>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
     <p class="success"><?php echo $_GET['success']; ?>
     <a class="close_success" style="cursor:pointer; position: absolute;right: 0.25rem; top: 0.125rem;">&times;</a></p>

   <?php } ?>
   <div class="form-step form-step-active">
    <div class="form-step1-active">
      <div class="input-group">
        <label for="valid_id">Select ID Type</label>
        <select name="valid_id" id="valid_id">
          <option>Student ID</option>
          <option>Company ID</option>
          <option >SSS ID</option>
          <option>UMID ID</option>
          <option>Philhealth ID</option>
          <option>TIN ID</option>
          <option>National ID</option>
          <option>NBI Clearance</option>
          <option>Police Clearance</option>
          <option>Birth Certificate(PSA)</option>
        </select>
      </div>
      <div class="input-group">
        <a href="index.php" class="btn btn-next width-100 ml-auto"><span>Cancel</span></a>
      </div>
      <div class="input-group">
        <a href="#" class="btn btn-next width-100 ml-auto"><span>Next</span></a>
      </div>
    </div>
    </div>      
  </div>
  <div class="form-step">
    <div class="form-step2-active">
      <div class="input-group">
        <label for="file">Upload Valid ID</label>
        <input type="file" name="img_upload" id="img_upload">
      </div>
      <a href="#" class="btn btn-prev"><span>Previous</span></a>
      <button type="submit" class="btn" name="img_submit"><span>Submit</span></button>
    </div>
  </div>
</div>

</form>
</body>
</html>
