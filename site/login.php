<?php
// Google Config
include_once 'gpConfig.php';
// User Registration Process Facebook/Google
include_once 'User.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login</title>
</head>


<body>
  <div class="login-container"  align="center">
    <div class="left-container">
      <form action="functions/login_process.php" method="post">
      <h2>LOGIN</h2>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <br>
      <br>
      <div class="inputbox-content">
      <input type="text" name="uname" placeholder="User Name">
      <span class="underline"></span>
      </div>
      <br>
      <div class="inputbox-content">
      <input type="password" name="password" placeholder="Password">
      <span class="underline"></span>
      </div>
      <br>
      <center><button type="submit" class="login"><span>Login</span></button>
      <a href="../index.php"><button type="button" class="back"><span>Back</span></button></a>
      </center>
      <br>
      <br>
      <center><a href="registration.php" class="ca">Create an account</a></center>
      <br>
     </form>

<div class="separator">or</div>
    <div class="buttons">
<?php
if(isset($_GET['code'])){
  $gClient->authenticate($_GET['code']);
  $_SESSION['token'] = $gClient->getAccessToken();
  header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
  $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
  //Get user profile data from google
  $gpUserProfile = $google_oauthV2->userinfo->get();
  
  //Initialize User class
  $user = new User();
  
  //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_id'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
    'last_name'    => $gpUserProfile['family_name'],
    'email'    => $gpUserProfile['email'],
    'gender'    => $gpUserProfile['gender'],
    'picture'     => $gpUserProfile['picture'],
    );
    $userData = $user->checkUser($gpUserData);
  
  //Storing user data into session
  $_SESSION['userData'] = $userData;
  
  //Render facebook profile data
    if(!empty($userData)){
        
        header("location:client/home.php");
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
  $authUrl = $gClient->createAuthUrl();
  $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">
  <button class="google">
  <i class="fa fa-google"></i> Login with Google
  </button>
  </a>';
}
?>
<?php echo $output; ?>

<?php //If no $accessToken is set then user should log in first
include 'fconfig.php';
if(isset($accessToken)) {
  if(isset($_SESSION['facebook_access_token'])){
      $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
    //Put short-lived access token in session
      $_SESSION['facebook_access_token'] = (string) $accessToken;
    
    //The OAuth 2.0 client handler helps us manage access tokens
    $oAuth2Client = $fb->getOAuth2Client();
    
    if(!$accessToken->isLongLived()) {
    //Exchanges a short-lived access token for a long-lived one
      try {
      $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
      $_SESSION['facebook_access_token'] = (string) $accessToken;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
      echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
      exit;
    }
    }      
  }
  
  //Redirect user to the index page if url has "code" parameter in query string
  if(isset($_GET['code'])){
    header('location:http://localhost/wbcms/site/index.php');
  }
  
  
  //Getting user's facebook profile information
  try {
    $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,picture');
    $fbUserData = $profileRequest->getGraphNode()->asArray();
    
    //Ceate an instance of the OauthUser class
    $oauth_user_obj = new OauthUser();
    $userData = $oauth_user_obj->verifyUser($fbUserData);
  } catch(FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    session_destroy();
    //Redirect user to the index page
    header("Location: ./");
    exit;
  } catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    session_destroy();
    //Redirect user to the index page
    header("Location: ./");
    exit;
  }
  
  } else {
  //Get login url
    $loginUrl = $helper->getLoginUrl($redirectUrl);
  echo '
  <a href="'.htmlspecialchars($loginUrl).'">
  <button class="facebook">
  <i class="fa fa-facebook-square"></i> Login with Facebook
  </button>
  </a>';
  
  
  }?>
  </div>
  </div>

  <div class="right-container">
    <img src="assets/img/login-right-img.jpg">
  </div>
  </div>
</body>
</html>