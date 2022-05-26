 <link rel="stylesheet" type="text/css" href="css/nav.css">

            <div class="top__nav">
               Navbar
            </div>
              <div class="nav" id="nav">
                  <nav class="nav__content">
                      <div class="nav__toggle" id="nav-toggle" onclick="openNav()">
                          <i class='bx bx-chevron-right' ></i>
                      </div>
          
                      <a href="#" class="nav__logo">
                         <img src="../assets/img/Logo.png">
                          <span class="nav__logo-name">WBCMS</span>
                      </a>
          
                      <div class="nav__list">
                          <a href="index.php" class="nav__link">
                             <i class='bx bxs-dashboard' ></i>
                              <span class="nav__name">Dashboard</span>
                          </a>
          
                          <a href="features_page.php" class="nav__link">
                              <i class='bx bx-file'></i>
                              <span class="nav__name">Features</span>
                          </a>
          
                          <a href="#" class="nav__link">
                              <i class='bx bx-envelope' ></i>
                              <span class="nav__name">Messages</span>
                          </a>
          
                          <a href="../logout.php" class="nav__link">
                              <i class='bx bx-bar-chart-square' ></i>
                              <span class="nav__name">Statistic</span>
                          </a>
          
                          <a href="#" class="nav__link" id="toggle">
                              <i class='bx bxs-moon'></i>
                              <span class="nav__name">Dark Theme</span>
                          </a>
                      </div>
                  </nav>
              </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   
// Index Page JS
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
showMenu('nav-toggle','nav');


function openNav() {
  document.getElementById("msg-icn").style.display = "none";
}
</script>
