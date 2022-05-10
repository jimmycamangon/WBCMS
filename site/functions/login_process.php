<?php 

session_start(); 
include "../includes/conn.php";

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
		header("Location: ../login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['online'] = "Active";
            	$_SESSION['user_fname'] = $row['first_name'];
            	$_SESSION['user_lname'] = $row['last_name'];
            	$_SESSION['user_mname'] = $row['middle_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['contact'] = $row['contact'];
            	$_SESSION['full_address'] = $row['full_address'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['user_id'] = $row['oauth_id'];
            	header("Location: ../client/index.php");
		        exit();
            }else{
				header("Location: ../login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location:../login.php");
	exit();
}