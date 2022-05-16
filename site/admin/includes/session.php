<?php 

	session_start();

    // Check if the user is already logged in, if not then redirect him to login page
if (!isset($_SESSION['logged_in_as_admin']))
{
    header("Location: index.php");
    die();
}

?>