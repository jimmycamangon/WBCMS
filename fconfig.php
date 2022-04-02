<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
require_once __DIR__ . '/Facebook_API/autoload.php';


// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
//Configuration of the Facebook SDK
$redirectUrl   = 'http://localhost/wbcms/facebook_process.php'; 
$fb = new Facebook([
  'app_id' => '1439534773186835',
  'app_secret' => '1cc33315f58c81dac52cb5d93f80aaa6',
  'default_graph_version' => 'v2.2',
  ]);
//Get the login redirect helper
$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
//Get the access token
try {
  if(isset($_SESSION['facebook_access_token'])) {
    $accessToken = $_SESSION['facebook_access_token'];
  } else {
     $accessToken = $helper->getAccessToken();
  }
}catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK error: ' . $e->getMessage();
  exit;
}


?>