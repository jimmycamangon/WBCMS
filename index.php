<?php 
include 'site/includes/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site/css/landpage.css">
    <link rel="icon" type="image/png" sizes="32x32" href="site/assets/img/Logo.png">
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
                <h1>
                    WBCMS
                </h1>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#updates">News</a></li>
                <li><a href="#instructions">Instructions</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="site/login.php">Sign In</a></li>
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
                <li><a href="site/login.php">Sign In</a></li>
            </ul>
            </div>
          </div>
          <div class="mobile-nav">
            <h1>
                WBCMS
            </h1>
            <span class="open-side-button" onclick="openNav()">&#9776;</span>
        </div>

        <div class="home-container">
            <div class="left-container">
                <h1>
                    Request Online Now!
                </h1>
                <p>Welcome to <span style="color: #03C3F5;font-weight: bold;">Web-Based Barangay Caingin Management System</span>
                    where you can request your required documents,
                    properties, hotlines and complainance with a help
                    of assistance.</p>
                <div class="home-buttons">
                    <a href="site/registration.php"><button class="GS"><span>Sign Up</span></button></a>
                </div>
            </div>
            <div class="right-container">
            <img src="site/assets/img/Logo.png" alt="">
            </div>
        </div>
        <div class="curve">
        <div class="custom-shape-divider-bottom-1649240167">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M598.97 114.72L0 0 0 120 1200 120 1200 0 598.97 114.72z" class="shape-fill"></path>
    </svg>
</div>
            </div>
    </section>
    <section id="updates">
    <div class="head-update">
	<h1>Check our Newest Post from Facebook</h1>
    </div>
        <?php 

        function make_query($conn)
        {
        $query = "SELECT * FROM updates ORDER BY id ASC LIMIT 6";
        $result = mysqli_query($conn, $query);
        return $result;
        }

        function make_slides($conn)
        {
        $output = '';
        $count = 0;
        $result = make_query($conn);
        while($row = mysqli_fetch_array($result))
        {
        if($count == 0)
        {
            $output .= '<div class="item">';
        } else {
        }
        $output .= '
        <div class="update_page_card">
        <div class="card ">
        <header class="card__header">
            <img src="site/assets/img/'.$row["img"].'" class="card__img" alt="Image">
            </header>
            <div class="card__quote">
                <h3>
                '.$row["title"].'
                </h3>
                <div class="card__foot">
                        <a href="'.$row["link"].'">Read More</a>
                    <div class="created_at">
                    Created at : '.$row["created_at"].'
                    </div>
            </div>
            </div>
            </div>
            </div>
       ';
       $count = $count + 1;
      }
      return $output;
        }
        ?>
         <?php echo make_slides($conn); ?>
    </section>
    <section id="instructions">
        <nav id="body-navigation">
            <div class="body-navigation-container">
                <ul>
                    <li><a href="#register" class="register_item navItem">Sign Up</a></li>
                    <li><a href="#verify" class="verify_item navItem">Verify</a></li>
                    <li><a href="#fill" class="fill_item navItem">Fill up Form</a></li>
                    <li><a href="#generate" class="generate_item navItem">Generate Receipt</a></li>
                    <li><a href="#waiting" class="waiting_item navItem">Waiting Process</a></li>
                    <li><a href="#features" class="features_item navItem"></a></li>
                </ul>
                        <div id="mySidenav2" class="side-nav-body">
                            <div class="side-nav-body-container">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
                                    <li><a href="#register">Sign Up</a></li>
                                    <hr>
                                    <li><a href="#verify">Verify</a></li>
                                    <hr>
                                    <li><a href="#fill">Fill up Form</a></li>
                                    <hr>
                                    <li><a href="#generate">Generate Receipt</a></li>
                                    <hr>
                                    <li><a href="#waiting">Waiting Process</a></li>
                                    
                            </div>
                        </div>
                <span class="open-side-button-body-nav" onclick="openNav2()">&#9776;</span>
            </div>
                <ul>
                <li><a href="#register" class="register_item navItem-Mobile">Sign Up</a></li>
                <li><a href="#verify" class="verify_item navItem-Mobile">Verify</a></li>
                <li><a href="#fill" class="fill_item navItem-Mobile">Fill up Form</a></li>
                <li><a href="#generate" class="generate_item navItem-Mobile">Generate Receipt</a></li>
                <li><a href="#waiting" class="waiting_item navItem-Mobile">Waiting Process</a></li>
                <li><a href="#features" class="features_item navItem-Mobile"></a></li>
            </ul>
            </nav>
        </nav>
        <section id="register" class="register">
           <div class="register-container">
               <div class="reg-video">
               <img src="site/assets/gif/register.gif" alt="" class="gif-cat">
               </div>
               <div class="reg-right-container">
                   <h1>Create your own Account</h1>
                  
                   <p> Type in your information in order to recognize you.<br>
                    Dont worry, your account information is protected with <a href="https://www.thawte.com/resources/getting-started/ssl-faq/#:~:text=An%20SSL%20certificate%20is%20a,sending%20it%20through%20the%20mail." class="SSL">SSL Certificate</a>
                    that contains security for your information.<br>
                    The following information includes:
                    </p>
                    <div class="reg-right-paragraph">
                    <li class="li-reg">&bull; Name (First Name, Middle Name, Last Name, Suffix)</li>
                    <li class="li-reg">&bull; Age</li>
                    <li class="li-reg">&bull; 2 Valid ID</li>
                    <li class="li-reg">&bull; Image(optional)</li>
                    <li class="li-reg">&bull; Email address</li>
                    <li class="li-reg">&bull; Full Address (Blk, Lot)</li>
                   </div>
               </div>
           </div>
        </section>
        <section id="verify" class="verify">
        <div class="verify-container">
                <div class="verify-left-container">
                   <h1>Account Verification</h1>
                  
                   <p> You need to verify your account to access the full feature of the system. You can 
                       request for full features to admin for visiting your profile and click the (request for verification button).
                       <br>
                       <br>
                       <a href="#features"><button class="GS"><span>See Features </span></button></a>
                    </p>
               </div>
               <div class="verify-video">
               <img src="site/assets/gif/register.gif" alt="" class="gif-cat">
               </div>
           </div>
        </section>
        <section id="fill" class="fill">
        <div class="fill-container">
               <div class="fill-video">
               <img src="site/assets/gif/register.gif" alt="" class="gif-cat">
               </div>
               <div class="fill-right-container">
                   <h1>Fill Up Forms</h1>
                  
                   <p> Type in your information in order to recognize you.<br>
                    Dont worry, your account information is protected with <a href="https://www.thawte.com/resources/getting-started/ssl-faq/#:~:text=An%20SSL%20certificate%20is%20a,sending%20it%20through%20the%20mail." class="SSL">SSL Certificate</a>
                    that contains security for your information.<br>
                    The information includes:
                    </p>
               </div>
           </div>
        </section>
        <section id="generate" class="generate">
            <h1 style="display:flex; justify-content:center; align-items:center; height:100%">GENERATE</h1>
        </section>
        <section id="waiting" class="waiting">
            <h1 style="display:flex; justify-content:center; align-items:center; height:100%">WAITING</h1>
        </section>
        <section id="features" class="features">
        <div class="features-container">
                   <h1>FEATURES</h1>
               <div class="features-right-container">
                
               </div>
        </div>
        </section>
    </section>
    <section id="about" class="about">
    <div class="register-container">
               <div class="reg-video">
               <img src="site/assets/gif/register.gif" alt="" class="gif-cat">
               </div>
               <div class="reg-right-container">
                   <h1>Create your own Account</h1>
                  
                   <p> Type in your information in order to recognize you.<br>
                    Dont worry, your account information is protected with <a href="https://www.thawte.com/resources/getting-started/ssl-faq/#:~:text=An%20SSL%20certificate%20is%20a,sending%20it%20through%20the%20mail." class="SSL">SSL Certificate</a>
                    that contains security for your information.<br>
                    The following information includes:
                    </p>
                    <div class="reg-right-paragraph">
                    <li class="li-reg">&bull; Name (First Name, Middle Name, Last Name, Suffix)</li>
                    <li class="li-reg">&bull; Age</li>
                    <li class="li-reg">&bull; Valid ID (Student ID(if student) , Any Valid id for adults)</li>
                    <li class="li-reg">&bull; Image(optional)</li>
                    <li class="li-reg">&bull; Email address</li>
                    <li class="li-reg">&bull; Full Address (Blk, Lot)</li>
                   </div>
               </div>
           </div>
    </section>
    <section id="login">
    </section>
    <a id="scrolltop" title="Back to top" href="#">&#10148;</a>


  <!-- Modal Sign Up-->
  <div class="modal fade" id="myModal" role="dialog">
    
      <!-- Modal content-->
      <div class="signup-container">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img src="site/assets/img/Logo.png" alt="">
        </div>
            <div class="sign-up-h3">
                <h3>Sign Up</h3>
            </div>
            <hr>
                <form action="../landpage_function/register.php">
                <div class="signup-body">
                        <label for="fname"><b>First Name:</b></label>
                        <input type="text" class="input" placeholder="Enter First Name" name="fname">
                        <br>
                        <br>
                        <label for="mname"><b>Middle Name:</b></label>
                        <input type="text" class="input" placeholder="Enter Middle Name" name="mname">
                        <br>
                        <br>
                        <label for="lname"><b>Last Name:</b></label>
                        <input type="text" class="input" placeholder="Enter Last Name" name="lname">
                        <br>
                        <br>
                        <label for="suffix"><b>Suffix (Jr, Sr, II, III, IV) (Optional):</b></label>
                        <input type="text" class="input" placeholder="Enter Suffix" name="suffix">
                        <br>
                        <br>
                        <div class="age-bday">
                        <label for="age"><b>Age:</b></label>
                        <input type="number" class="input input_age" placeholder="Enter Age" name="email">
                        <label for="age"><b>Birthday:</b></label>
                        <input type="date" id="birthday" name="birthday" class="input input_bday">
                        </div>
                        <br>
                        <br>
                        <div class="form-check gender-status">
                        <label for="age"><b>Gender:</b></label><br>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" onClick="ckChange(this)">
                            <label class="form-check-label" >
                                Male
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" onClick="ckChange(this)">
                            <label class="form-check-label" >
                                Female
                            </label>
                            &nbsp;&nbsp;
                            |
                            &nbsp;&nbsp;
                        <label for="age"><b>Status:</b></label><br>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" tabIndex="1" onClick="ckChange(this)">
                            <label class="form-check-label" >
                                Single
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" tabIndex="1" onClick="ckChange(this)">
                            <label class="form-check-label" >
                                Engaged
                            </label>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" tabIndex="1" onClick="ckChange(this)">
                            <label class="form-check-label">
                                Married
                            </label>
                        </div>      
                        <br>
                        <br>
                        <label for="psw-repeat"><b>Full Address (Blk, Lot):</b></label>
                        <input type="text" class="input" placeholder="Full Address" name="psw-repeat">
                        <div class="email-contact">
                        <label for="email"><b>Email:</b></label>
                        <input type="text" class="input" placeholder="Enter Email" name="email">
                        <label for="email"><b>Contact:</b></label>
                        <input type="text" class="input" placeholder="Enter Contact" name="email">
                        </div>
                        <br>
                        <br>
                        <label for="psw"><b>Password:</b></label>
                        <input type="password" class="input" placeholder="Enter Password" name="psw">
                        <br>
                        <br>
                        <label for="psw-repeat"><b>Repeat Password:</b></label>
                        <input type="password" class="input" placeholder="Repeat Password" name="psw-repeat" >
                        <br>
                        <br>

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <div class="close-submit">
                        <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-submit" data-dismiss="modal">Submit</button>
                    </div>
                    <center>or <br></center>
                    <div class="modal-footer">
                        <button class="loginBtn loginBtn--facebook">
                        Login with Facebook
                        </button>
                        <button class="loginBtn loginBtn--google">
                        Login with Google
                    </button>
                    </div>
                    </form>
      </div>
    </div>
  </div>
</div>

<script src="index.js"></script>
</body>
</html>