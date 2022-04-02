<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 

//Include Google client library 
include_once 'Google_API/Google_Client.php';
include_once 'Google_API/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '992588464997-j6ckqkd1rj27uceuk47eptrebqgaevjf.apps.googleusercontent.com'; //Google client ID
$clientSecret = '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'; //Google client secret
$redirectURL = 'http://localhost/wbcms/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>