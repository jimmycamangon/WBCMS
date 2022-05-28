<?php 

session_start(); 
include "../../includes/conn.php";


if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		$_SESSION['error'] = "Username is required";
		header("Location: ../login.php");
	    exit();
	}else if(empty($pass)){
		$_SESSION['error'] = "Password is required";
		header("Location: ../login.php");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM admin WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['logged_in_as_admin'] = true;
            	$_SESSION['admin_id'] = $row['id'];
            	$_SESSION['user_name'] = $row['user_name'];
            	header("Location: ../index.php");
		        exit();
            }else{
				   $_SESSION['error'] = "Incorrect User Name or Password";
				   header("Location: ../login.php");
		        exit();
			}
		}else{
			$_SESSION['error'] = "Incorrect User Name or Password";
			header("Location: ../login.php");
	        exit();
		}
	}
	
}else{
	header("Location:../login.php");
	exit();
}