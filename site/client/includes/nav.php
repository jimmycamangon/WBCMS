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
                    <a href="index.php" class="nav__link">
                        <i class='bx bxs-home'></i>
                        <span class="nav__name">Home</span>
                    </a>
    
                    <a href="features_page.php" class="nav__link">
                        <i class='bx bx-file'></i>
                        <span class="nav__name">Features</span>
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