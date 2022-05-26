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

$result = $conn->query("SELECT * FROM users");
$user = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  <title>Dashboard</title>
</head>
<body>
  <?php include 'includes/nav.php'; ?>
  <section class="home-section">
    <div class="home-content">
      <div class="top-left">
      <i class='bx bx-menu' ></i>
      <a class="navbar-brand" href="#"> Dashboard </a>
      </div>

      <div class="top-rigt">
      <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">


            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="material-icons">more_vert</span>
          </button>

          <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">   
              <li class="dropdown nav-item">
                <a href="#" class="nav-link" data-toggle="dropdown" id="notificationLink"  onclick = "removeNotification()">
                 <span class="material-icons">notifications</span>
                 <span class="notification" id="notification_count"></span>
               </a>
               <ul class="dropdown-menu">
                <li>
                  <span id="noti_message"></span>
                </li>
                <li>
                  <center>
                    <form action="clear_message.php" method="post">
                      <input type="submit" name="clear" style="font-size:0.80rem; border: none; cursor: pointer; background: transparent;" value="Clear">
                    </form></center>
                  </li>

                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="nav-link" data-toggle="dropdown">
                 <span class="material-icons">person</span>
               </a>
               <ul class="dropdown-menu">
                <li>
                  <a href="logout.php">Logout</a>
                </li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  </div>
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
        <h3 class="card-title"><?php echo $student_result; ?></h3>
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
        <h3 class="card-title"><?php echo $unemployed_result; ?></h3>
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
        <h3 class="card-title"><?php echo $employed_result; ?></h3>
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
        <h3 class="card-title"><?php echo $senior_result; ?></h3>
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

<br>



<div class="row ">
  <div class="col-lg-12 col-md-12">
    <div class="card" style="min-height: 485px">
      <div class="card-header card-header-text">
        <h4 class="card-title" style="font-weight:bold">Total Users</h4>
        <nav aria-label="Page navigation">
        </div>

        <div style="height: 600px; overflow-y: auto; padding: 1em;">
          <div class="form-group pull-right">
            Search: <input type="text" class="search form-control">
          </div>
          <span class="counter pull-right"></span>
          <table class="table table-hover table-bordered results">
            <thead>
              <tr>
                <th class="col-md-3 col-xs-3">ID</th>
                <th class="col-md-3 col-xs-3">Name</th>
                <th class="col-md-3 col-xs-3">Oauth ID</th>
                <th class="col-md-4 col-xs-4">Status</th>
                <th class="col-md-3 col-xs-3">Oauth Provider</th>
                <th class="col-md-3 col-xs-3">Action</th>
              </tr>
              <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
              </tr>
            </thead>
            <tbody>
             <?php foreach($user as $user) :  ?>
              <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['oauth_id']; ?></td>
                <td><?= $user['status']; ?></td>
                <td><?= $user['oauth_provider']; ?></td>
                <td><center><a href="view_user.php?id=<?= $user['id'];?>"><i class='bx bxs-trash' style="color:red;font-size: 1.50rem;"></i></a></center></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>



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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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


  $(document).ready(function() {
    $(".search").keyup(function () {
      var searchTerm = $(".search").val();
      var listItem = $('.results tbody').children('tr');
      var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

      $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
      }
    });

      $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
        $(this).attr('visible','false');
      });

      $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
        $(this).attr('visible','true');
      });

      var jobCount = $('.results tbody tr[visible="true"]').length;
      $('.counter').text(jobCount + ' item');

      if(jobCount == '0') {$('.no-result').show();}
      else {$('.no-result').hide();}
    });
  });
</script>
</body>
</html>
