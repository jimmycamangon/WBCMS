<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>WBCMS</title>
</head>
<body>
    <div class="body__container">
    <section id="home">
        <div class="nav-container">
            <div class="logo">        
            </div>
            <ul>
                <li><a href="index.php">Log out</a></li>
            </ul>
        </div>
        <div id="mySidenav" class="sidenav">
            <div class="side-container">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <ul>
                <li><a href="#home">Home</a></li>
                <hr>
                <li><a href="#updates">News</a></li>
                <hr>
                <li><a href="#instructions">Instructions</a></li>
                <hr>
                <li><a href="#features">Features</a></li>
                <hr>
                <li><a href="#about">About</a></li>
                <hr>
                <li><a href="index.php">Sign In</a></li>
            </ul>
            </div>
          </div>
          <div class="mobile-nav">
            <span class="open-side-button" onclick="openNav()">&#9776;</span>
        </div>

        <div class="home-container">
            <div class="left-container">
                <h1>
                    Verify your account
                </h1>
                <p>Kindly complete all the information including 2 valid id to access all system's feature.</p>
                <div class="home-buttons">
                    <button class="GS" data-toggle="modal" data-target="#myModal"><span>Verify </span></button>
                </div>
            </div>
            <div class="right-container">
            <img src="assets/img/Logo.png" alt="">
            </div>
        </div>
        <div class="curve">
            <div class="custom-shape-divider-bottom-1649083328">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
              <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
              <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
              <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
            </div>
    </section>
    <section id="features">
  <h1>Features</h1>
    </section>
</div>

<script src="landpage.js"></script>
</body>
</html>
<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("body__container").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
  }
  </script>