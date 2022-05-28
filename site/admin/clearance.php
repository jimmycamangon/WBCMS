<?php 

include '../includes/conn.php';
include 'includes/session.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link  type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <title>Clearance</title>
</head>
<body>
  <?php include 'includes/nav.php'; ?>
  <section class="home-section">
    <div class="home-content">
      <div class="top-left">
      <i class='bx bx-menu' ></i>
      <a class="navbar-brand" href="#"> Clearance </a>
      </div>

<div class="top__nav">
          <div class="top__content">
            <div class="top__profile">
              <img src="<?php if(!isset($_SESSION['picture'])) { echo '../assets/img/alt-image.png'; } else { echo $_SESSION["picture"]; } ?>" alt="Image">
              <h1><?php echo $_SESSION['user_name'] ?></h1></div>


             <!-- Drop Down -->
            <div class="apto-dropdown-wrapper">
               <button class="apto-trigger-dropdown" id="notificationLink" onclick = "removeNotification()">
               <span id="notification_count"></span> <i class='bx bxs-bell'></i>
               </button>
               <div class="dropdown-menu-notif" data-selected="logout">
               <span id="noti_message"></span>
               </div>
            </div>

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

</div>



<div class="main-content">

<br>


    <div class="row ">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="min-height: 485px">
                <div class="card-header card-header-text">
                    <h4 class="card-title" style="font-weight:bold">Clearance Requests</h4>
                </div>
                <div id="clearance_requests"></div>
            </div>
        </div>

    </div>


    <script type="text/javascript">

       function loadDoc() {


          setInterval(function(){

             var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("clearance_requests").innerHTML = this.responseText;
               }
           };
           xhttp.open("GET", "clearance_requests.php", true);
           xhttp.send();
       },1000);


      }
      loadDoc();

  </script>


<footer class="footer">
  <div class="container-fluid">

    <div class="col-md-7">
     <p class="copyright d-flex justify-content-end"> @CCS
      All rights Reserved.
    </p>
  </div>
</div>
</div>
</div>


</div>
</section>
<script type="text/javascript" src="notif.js"></script>
<script type="text/javascript" src="all.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
