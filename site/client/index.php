<?php 
    session_start();

    include '../includes/conn.php';
    include '../includes/session.php';
 ?>
<style type="text/css">
	/*=============== GOOGLE FONTS ===============*/
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

/*=============== VARIABLES CSS ===============*/
:root {
  /*========== Colors ==========*/
  /*Color mode HSL(hue, saturation, lightness)*/
  --first-color: hsl(0, 0%, 99%);
  --dark-color:  hsl(0, 100%, 1%);
  --title-color: hsl(0, 0%, 99%);
  --text-color: hsl(228, 8%, 50%);
  --body-color: hsl(228, 100%, 99%);
  --container-color: #22272e;

  /*========== Font and typography ==========*/
  /*.5rem = 8px | 1rem = 16px ...*/
  --body-font: 'Poppins', sans-serif;
  --normal-font-size: .938rem;
}

/* Responsive typography */
@media screen and (min-width: 968px) {
  :root {
    --normal-font-size: 1rem;
  }
}

/*=============== BASE ===============*/
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
html {
  height: auto;
  overflow-x: hidden;
}
body {
  position: relative;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
  background-color: var(--body-color);
  color: var(--text-color);
  height: auto;
  width: 100%;
  overflow-x: hidden;
}

h1 {
  color: var(--title-color);
}

a {
  text-decoration: none;
}

/*Scroll Bar*/
::-webkit-scrollbar {
  width: 10px;
}

 
/* Handle */
::-webkit-scrollbar-thumb {
  background: var(--container-color); 
}

/*=============== NAV ===============*/
.container {
  margin-left: 1rem;
  margin-right: 1rem;
}

.section {
  padding: 2rem 0;
}

@media screen and (max-width: 767px) {
  .nav__logo, 
  .nav__toggle, 
  .nav__name {
    display: none;
  }

  .nav__list {
    position: fixed;
    bottom: 2rem;
    background-color: var(--container-color);
    box-shadow: 0 8px 24px hsla(228, 81%, 24%, .15);
    width: 80%;
    padding: 30px 40px;
    border-radius: 1rem;
    left: 0;
    right: 0;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    column-gap: 36px;
    transition: .4s;
  }
}

.nav__link {
  display: flex;
  color: var(--text-color);
  font-weight: 500;
  transition: .3s;
}

.nav__link i {
  font-size: 1.25rem;
}

.nav__link:hover {
  color: var(--first-color);
}

/* Active link */
.active-link {
  color: var(--first-color);
}

/*=============== BREAKPOINTS ===============*/
/* For small devices */
@media screen and (max-width: 320px) {
  .nav__list {
    column-gap: 20px;
  }
}

/* For medium devices */
@media screen and (min-width: 576px) {
  .nav__list {
    width: 500px;
  }
}

@media screen and (min-width: 767px) {
  .container {
    margin-left: 7rem;
    margin-right: 1.5rem;
  }
  .nav {
    position: fixed;
    left: 0;
    background-color: var(--container-color);
    box-shadow: 1px 0 4px hsla(228, 81%, 49%, .15);
    width: 84px;
    height: 100%;
    padding: 2rem;
    transition: .3s;
  }
  .top__nav {
    width: 90%;
    height: 20px;
    margin: 20px 100px;
    padding: 1em;
  }
  .top__content {
    float: right;
    display: flex;
    justify-content: end;
    flex-direction: row;
    align-items: center;
    gap: 3em;
  }
  .top__notif i:hover {
    color: var(--dark-color);
  }
  .top__notif i {
    cursor: pointer;
    color: var(--text-color);
    font-size: 2rem;
  }
  .top__profile {
    display: flex;
    gap: 2em;
    justify-content: center;
    align-items: center;
  }
  .top__profile h1 {
    color: var(--text-color);
    font-size: 1rem;
    cursor: pointer;
  }
  .top__profile h1:hover {
    color: var(--dark-color);
  }
  .top__profile img {
    width: 40px;
    height: 40px;
  }
  .nav__logo {
    display: flex;
  }
  .nav__logo img {
    width: 20px;
  }
  .nav__logo-name {
    color: var(--title-color);
    font-weight: 600;
  }
  .nav__logo, .nav__link {
    align-items: center;
    column-gap: 1rem;
  }
  .nav__list {
    display: grid;
    row-gap: 2.5rem;
    margin-top: 2.5rem;
  }
  .nav__content {
    overflow: hidden;
    height: 100%;
  }
  .nav__toggle {
    position: absolute;
    width: 30px;
    height: 30px;
    background-color: var(--dark-color);
    color: #fff;
    border-radius: 50%;
    font-size: 1.20rem;
    display: grid;
    place-items: center;
    top: 2rem;
    right: -10px;
    cursor: pointer;
    transition: .4s;
  }
  .nav__toggle:hover{
    background-color: var(--first-color);
    color: var(--dark-color);
    border: 1px solid var(--container-color);
  }
}

/* Show menu */
.show-menu {
  width: 255px;
}

/* Rotate toggle icon */
.rotate-icon {
  transform: rotate(180deg);
}


.home__container {
  margin: 70px 100px;
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  grid-template-rows: repeat(4, 1fr);
  width: 90%;
  height: auto;
  gap: 1em;
}

.home__box {
  width: 100%;
  height: 200px;
  align-self: stretch;
  background-color: #fff;
  box-shadow: rgba(0, 0, 0, 0.1) -4px 9px 25px -6px;
  border-radius: 1em;
}

.home__box:nth-child(1) {
  grid-column: 1 / span 4;
  grid-row: 1 / span 2;
  height: 100%;
}
.home__box:nth-child(2) {
  grid-column: 5 / span 6;
  grid-row: 1 / span 1;
  background-color: var(--container-color);
}
.home__box:nth-child(3) {
  grid-column: 5 / span 6;
  grid-row: 2 / span 3;
  height: 100%;
}
.home__box:nth-child(4) {
  grid-column: 1 / 5;
  grid-row: 3 / span 2;
  height: 100%;
}
.home__box:nth-child(6) {
  grid-column: 5 / span 1;
  grid-row: 2 / span 4;
}
/*Profile Container*/
.home__box1__container {
  display: flex;
  height: 100%;
  justify-content: center;
  align-items: center;
}
.left__box1 {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 50%;
}
.left__box1 img {
  width: 200px;
  border-radius: 10em;
}
.left__box1 .message__not__verified {
  display: flex;
  gap: 0.50em;
  justify-content: center;
  align-items: center;
}
.left__box1 .message__verified {
  display: flex;
  gap: 0.50em;
  justify-content: center;
  align-items: center;
}
.message__not__verified i{
  color: #DC143C;
}
.message__verified i{
  color: #00FFFF;
}
.right__box1{
  width: 70%;
  display: flex;
  justify-content: center;
  gap: 2em; 
  flex-direction: column;
}
.right__box1__head {
  display: flex;
  justify-content: space-evenly;
  color: var(--dark-color);
  font-size: 2rem;
  font-weight: bold;
  text-transform: capitalize;
}

/*Loading Effect*/

.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #fff;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}

/*Update Button*/
.update {
  background-color: var(--container-color);
  width: 200px;
  max-width: 80%;
  height: 45px;
  border-radius: 0.25em;
  border: none;
  cursor: pointer;
  color: #fff;
  font-weight: 20px;
  transition: all 0.5s;
  font-size: 1.1rem;
  z-index: 4;
}
.update span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size: min(max(15px, 3vw), 15px);
}
.update span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.update:hover {
  border: 1px var(--primary-color) solid;
}
.update:hover span {
  padding-right: 25px;
}

.update:hover span:after {
  opacity: 1;
  right: 0;
}

/*Verification Container*/
.home__box2__container {
  display: flex;
  height: 100%;
  justify-content: center;
  align-items: center;
}
.right__box2 {
  text-align: center;
  width: 40%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.right__box2 p {
  color: var(--first-color);
}
.home__box2__container img {
  width: 100%;
  height: 90%;
}

/*Verify Button*/
.GS {
  background-color: #03C3F5;
  width: 200px;
  max-width: 80%;
  height: 45px;
  border-radius: 0.25em;
  border: none;
  cursor: pointer;
  color: #fff;
  font-weight: 20px;
  transition: all 0.5s;
  font-size: 1.1rem;
  z-index: 4;
}
.GS span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  font-size: min(max(15px, 3vw), 15px);
}
.GS span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.GS:hover {
  border: 1px var(--primary-color) solid;
}
.GS:hover span {
  padding-right: 25px;
}

.GS:hover span:after {
  opacity: 1;
  right: 0;
}

/* For 2K & 4K resolutions */
@media screen and (min-width: 2048px) {
  body {
    zoom: 1.7;
  }
}

@media screen and (min-width: 3840px) {
  body {
    zoom: 2.5;
  }
}

</style>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        
  <!-- Side Nav -->
        <div class="nav" id="nav">
            <nav class="nav__content">
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-chevron-right' ></i>
                </div>
    
                <a href="#" class="nav__logo">
                   <img src="../assets/img/Logo.png">
                    <span class="nav__logo-name">WBCMS</span>
                </a>
    
                <div class="nav__list">
                    <a href="#" class="nav__link active-link">
                        <i class='bx bxs-home'></i>
                        <span class="nav__name">Home</span>
                    </a>
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-file'></i>
                        <span class="nav__name">Requests</span>
                    </a>
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-envelope' ></i>
                        <span class="nav__name">Messages</span>
                    </a>
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-bar-chart-square' ></i>
                        <span class="nav__name">Statistic</span>
                    </a>
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-cog' ></i>
                        <span class="nav__name">Settings</span>
                    </a>
                </div>
            </nav>
        </div>

        <div class="top__nav">
          <div class="top__content">
            <div class="top__notif"><i class='bx bxs-bell'></i></div>
            <div class="top__profile">
              <img src="<?php if(!isset($_SESSION['picture'])) { echo '../assets/img/alt-image.png'; } else { echo $_SESSION["picture"]; } ?>" alt="Image">
              <h1><?php echo $_SESSION['user_fname']; ?> <?php echo $_SESSION['user_lname'] ?></h1></div>
              <a href="../logout.php">Logout</a>
          </div>
        </div>
        <!-- Container -->
        <div class="home__container">
          <div class="home__box">
            <div class="home__box1__container">
              <div class="left__box1">
                <img src="<?php if(!isset($_SESSION['picture'])) { echo '../assets/img/alt-image.png'; } else { echo $_SESSION["picture"]; } ?>" alt="Image"><br>
                <?php 
                $id=$_SESSION['user_id'];
                $result = mysqli_query($conn,"SELECT status FROM users WHERE oauth_id = $id");
                $row  = mysqli_fetch_array($result);
                  if($row['status'] == 'not_verified') {?>
                    <div class="message__not__verified"><i class='bx bxs-error-circle' ></i><h5>Account not Verified</h5></div>
                  <?php } if($row['status'] == 'verified') { ?>
                    <div class="message__verified"><i class='bx bxs-check-circle' ></i><h5>Account Verified</h5></div>
                  <?php } ?>
              </div>
              <div class="right__box1">
                <div class="right__box1__head">
                    <?php echo $_SESSION['user_fname']; ?> <?php echo $_SESSION['user_lname'] ?>
                     <a href="verify.php"><button class="update"><span> Update </span></button></a>
                </div>
                <div class="right__box1__content">
                    <?php if(!isset($_SESSION['full_address'])) { ?><i class='bx bx-current-location' ></i>&nbsp;&nbsp;&nbsp;None<?php } else {?> <i class='bx bx-current-location' ></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['full_address'];?><?php } ?><br><br>
                    <i class='bx bxs-envelope' ></i></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['email'];?><br><br>
                       <?php if(!isset($_SESSION['full_address'])) { ?><i class='bx bxs-phone' ></i>&nbsp;&nbsp;&nbsp;None<?php } else {?><i class='bx bxs-phone' ></i>>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['contact'];?><?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="home__box">
            <div class="home__box2__container">
               <?php 
                $id=$_SESSION['user_id'];
                $result = mysqli_query($conn,"SELECT status FROM users WHERE oauth_id = $id");
                $row  = mysqli_fetch_array($result);
                  if($row['status'] == 'not_verified') {
                      ?>
                        <div class="left__box2"> <img src="../assets/img/SVG/Greet2.png" alt="Image"></div>
                        <div class="right__box2">
                          <p>Kindly complete all the information including 1 valid id to access all system's feature.</p>
                          <br>
                          <a href="verify.php"><button class="GS"><span> Verify </span></button></a>
                        </div>
                  <?php } if($row['status'] == 'processing') { ?>
                          <div class="left__box2"> <img src="../assets/img/SVG/processing2.png" id="center_logo" alt="Image"></div>
                          <div class="right__box2">
                          <p>Your account request verification is now in process</p>
                          <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                          </div>
                  <?php } if($row['status'] == 'verified') { ?>
                         <div class="left__box2"> <img src="../assets/img/Logo.png" id="center_logo" alt="Image"></div>
                        <div class="right__box2">
                          <h1>Welcome to WBCMS.</h1>
                        </div>
                  <?php } ?>
            </div>
          </div>
          <div class="home__box"></div>
          <div class="home__box"></div>

        </div>


</body>
</html>
<script type="text/javascript">
  /*=============== LINK ACTIVE ===============*/
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    linkColor.forEach(l => l.classList.remove('active-link'))
    this.classList.add('active-link')
}

linkColor.forEach(l => l.addEventListener('click', colorLink))

/*=============== SHOW HIDDEN MENU ===============*/
const showMenu = (toggleId, navbarId) =>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId)

    if(toggle && navbar){
        toggle.addEventListener('click', ()=>{
            /* Show menu */
            navbar.classList.toggle('show-menu')
            /* Rotate toggle icon */
            toggle.classList.toggle('rotate-icon')
        })
    }
}
showMenu('nav-toggle','nav')
</script>