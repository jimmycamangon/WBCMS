<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
  <link rel="stylesheet" href="css/verify.css" />
  <script src="all.js" defer></script>
  <title>Verify Now!!!</title>
</head>

<body>

<?php
if(isset($_POST['img_submit'])){
  
  $img_name=$_FILES['img_upload']['name'];
  $tmp_img_name=$_FILES['img_upload']['tmp_name'];
  $folder='uploads/';
  move_uploaded_file($tmp_img_name,$folder.$img_name);
}

?>



  <form action='' method='POST' class="form" enctype='multipart/form-data'>
      <div class="head">
    <img src="../assets/img/Logo.png">
  </div>
    <h1 class="text-center">Verify Now!!!</h1>
    <!-- Progress bar -->
    <div class="progressbar">
      <div class="progress" id="progress"></div>

      <div class="progress-step progress-step-active" data-title="Full Name"></div>
      <div class="progress-step" data-title="Contact Details"></div>

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
        <label for="validid">Select ID Type</label>
        <select name="validid" id="validid">
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
        <a href="index.php" class="btn btn-next width-100 ml-auto">Cancel</a>
      </div>
      <div class="input-group">
        <a href="#" class="btn btn-next width-100 ml-auto">Next</a>
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
      <a href="#" class="btn btn-prev">Previous</a>
      <input type="submit"   class="btn" name="img_submit"/>
    </div>
  </div>
</div>

</form>
</body>
</html>
