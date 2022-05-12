<?php 
// Check if the user Requested Already if not Redirect
if(!isset($_SESSION["requested"]) || $_SESSION["requested"] !== true){
    header("location: ../features_page.php");
    exit;
}

?>