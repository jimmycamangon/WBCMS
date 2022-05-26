<?php 

include '../includes/conn.php';
include 'includes/session.php';

// Select Students
$select_student = "SELECT resident FROM users WHERE resident = 'Student'";
$select_student_result = mysqli_query($conn,$select_student);
$student_result = $select_student_result->num_rows;

// Select Unemployed
$select_unemployed = "SELECT resident FROM users WHERE resident = 'UnEmployed'";
$select_unemployed_result = mysqli_query($conn,$select_unemployed);
$unemployed_result = $select_unemployed_result->num_rows;

// Select Employed
$select_employed = "SELECT resident FROM users WHERE resident = 'Employed'";
$select_employed_result = mysqli_query($conn,$select_employed);
$employed_result = $select_employed_result->num_rows;

// Select Senior
$select_senior = "SELECT resident FROM users WHERE resident = 'Senior Citizen'";
$select_senior_result = mysqli_query($conn,$select_senior);
$senior_result = $select_senior_result->num_rows;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">WBCMS</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Requests</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Requests</a></li>
          <li><a href="#">Clearance</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name">Jims</div>
        <div class="job">Admin</div>
      </div>
      <a href="logout.php"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <div class="main-content">
 <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header">
                <div class="icon icon-warning">
                    <span><i class='bx bxs-user-account'></i></span>
                </div>
            </div>
            <div class="card-content">
                <p class="category"><strong>Total Users</strong></p>
                <h3 class="card-title"><?php echo $total_user_result; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">info</i>
                    <a href="#">Below Information</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header">
                <div class="icon icon-success">
                  <span><i class='bx bxs-user-check'></i></span>

              </div>
          </div>
          <div class="card-content">
            <p class="category"><strong>Verified Users</strong></p>
            <h3 class="card-title"><?php echo $verified_result; ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="#pablo">See More</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header">
            <div class="icon icon-rose">
                <span><i class='bx bxs-user-x' ></i></span>
            </div>
        </div>
        <div class="card-content">
            <p class="category"><strong>Unverified Users</strong></p>
            <h3 class="card-title"><?php echo $non_verified_result; ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="#pablo">See More</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header">
            <div class="icon icon-info">

                <span><i class='bx bx-group'></i></span>
            </div>
        </div>
        <div class="card-content">
            <p class="category"><strong>Cashier Queue</strong></p>
            <h3 class="card-title"><?php echo $in_queue_cashier_result; ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-info">info</i>
                <a href="#pablo">See More</a>
            </div>
        </div>
    </div>
</div>

</div>
</div>


    </div>
  </section>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>
