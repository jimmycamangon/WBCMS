<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/Logo.png">
  <link rel="stylesheet" href="css/registration.css" />
  <script src="registration.js" defer></script>
  <title>Registration Form</title>
</head>
<body>
  <form action="functions/registration_process.php" class="form" method="POST">
      <div class="head">
    <img src="assets/img/Logo.png">
  </div>
    <h1 class="text-center">Registration Form</h1>
    <!-- Progress bar -->
    <div class="progressbar">
      <div class="progress" id="progress"></div>

      <div class="progress-step progress-step-active" data-title="Full Name"></div>
      <div class="progress-step" data-title="Contact Details"></div>
      <div class="progress-step" data-title="Account Details"></div>
      <div class="progress-step" data-title="Residents"></div>
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
        <label for="fname">Firstname</label>
          <?php if (isset($_GET['fname'])) { ?>
          <input type="text" name="fname" id="fname"
           value="<?php echo $_GET['fname']; ?>">
           <?php }else{ ?>
            <input type="text" name="fname">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="position">Middlename</label>
          <?php if (isset($_GET['mname'])) { ?>
          <input type="text" name="mname" id="mname"
           value="<?php echo $_GET['mname']; ?>">
           <?php }else{ ?>
            <input type="text" name="mname">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="lastname">Lastname</label>
          <?php if (isset($_GET['lname'])) { ?>
          <input type="text" name="lname" id="lname"
           value="<?php echo $_GET['lname']; ?>">
           <?php }else{ ?>
            <input type="text" name="lname">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="suffix">Suffix</label>
        <?php if (isset($_GET['suffix'])) { ?>
        <select name="suffix" id="suffix" value="<?php echo $_GET['suffix']; ?>">
          <option value="None">None</option>
          <option value="Jr">Jr</option>
          <option value="Sr">Sr</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
        </select>
        <?php }else{ ?>
        <select name="suffix" id="suffix">
          <option >None</option>
          <option>Jr</option>
          <option>Sr</option>
          <option>II</option>
          <option>III</option>
          <option>IV</option>
        </select>
        <?php }?>        
      </div>
      <div class="input-group">
        <label for="age">Age</label>
           <?php if (isset($_GET['age'])) { ?>
          <input type="text" name="age" id="age"
           value="<?php echo $_GET['age']; ?>">
           <?php }else{ ?>
            <input type="text" name="age">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="position">Birthday</label>
           <?php if (isset($_GET['birthday'])) { ?>
          <input type="date" name="birthday" id="birthday"
           value="<?php echo $_GET['birthday']; ?>">
           <?php }else{ ?>
            <input type="date" name="birthday">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
          <option >Male</option>
          <option>Female</option>
        </select>
      </div>
      <div class="input-group">
        <label for="suffix">Relationsip Status</label>
        <select name="relationship_status" id="relationship_status">
          <option >Single</option>
          <option>Windowed</option>
          <option>Married</option>
        </select>
      </div>
      <div class="input-group">
        <a href="../index.php" class="btn btn-next width-100 ml-auto"><span>Cancel</span></a>
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
        <label for="phone">Email Address</label>
           <?php if (isset($_GET['email'])) { ?>
          <input type="text" name="email" id="email"
           value="<?php echo $_GET['email']; ?>">
           <?php }else{ ?>
            <input type="text" name="email">
           <?php }?>
      </div>

      <div class="input-group">
        <label for="contact">Mobile Number</label>
           <?php if (isset($_GET['contact'])) { ?>
          <input type="text" name="contact" id="contact"
           value="<?php echo $_GET['contact']; ?>">
           <?php }else{ ?>
            <input type="text" name="contact">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="address">Full Address(Blk, Lot):</label>
           <?php if (isset($_GET['address'])) { ?>
          <input type="text" name="address" id="address"
           value="<?php echo $_GET['address']; ?>">
           <?php }else{ ?>
            <input type="text" name="address">
           <?php }?>
      </div>

         <a href="#" class="btn btn-prev"><span>Previous</span></a>
         <a href="#" class="btn btn-next"><span>Next</span></a>
    </div>
  </div>

  <div class="form-step">
    <div class="form-step3-active">
      <div class="input-group">
        <label for="uname">Username</label>
           <?php if (isset($_GET['uname'])) { ?>
          <input type="text" name="uname" id="uname"
           value="<?php echo $_GET['uname']; ?>">
           <?php }else{ ?>
            <input type="text" name="uname">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="dob">Password</label>
           <?php if (isset($_GET['password'])) { ?>
          <input type="password" name="password" id="password"
           value="<?php echo $_GET['password']; ?>">
           <?php }else{ ?>
            <input type="password" name="password">
           <?php }?>
      </div>
      <div class="input-group">
        <label for="ID">Repeat Password</label>
           <?php if (isset($_GET['re_password'])) { ?>
          <input type="password" name="re_password" id="re_password"
           value="<?php echo $_GET['re_password']; ?>">
           <?php }else{ ?>
            <input type="password" name="re_password">
           <?php }?>
      </div>
      <div class="btns-group">
         <a href="#" class="btn btn-prev"><span>Previous </span></a>
         <a href="#" class="btn btn-next"><span>Next </span></a>
      </div>
    </div>
  </div>


  <div class="form-step">
  <div class="input-group">
        <div class="form-step4-active">
        <label for="resident">Select Residents Type</label>
        <select name="resident" id="resident">
          <option>Student</option>
          <option>UnEmployed</option>
          <option >Employed</option>
          <option>Senior Citizen</option>
        </select>
      </div>
     <br>
    <div class="btns-group">
    <a href="#" class="btn btn-prev"><span>Previous</span></a>
    <button type="submit" class="btn" name="submit"><span>Submit</span></button>
    </div>
  </div>
</form>
</body>
</html>
