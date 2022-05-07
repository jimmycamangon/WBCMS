<?php 

include 'fconfig.php';
include 'User.php';
//If no $accessToken is set then user should log in first
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
	<button class="loginBtn facebook">
	<i class="fa fa-facebok"></i> Login with Facebook
	</button>
	</a>';
	
  
  }
?>