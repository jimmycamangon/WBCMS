<?php

session_start();

//Unset session and user data from session
unset($_SESSION['logged_in_as_admin']);

//Destroy entire session
session_destroy();

//Redirect to homepage
header("Location: index.php");
?>