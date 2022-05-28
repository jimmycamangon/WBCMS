<?php 
session_start(); 
include "../includes/conn.php";
if (isset($_POST['submit'])) {
if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $oauth_provider= "Form Registration";
	$oauth_id = mt_rand();
	$status = "trial";
	$fname = validate($_POST['fname']);
    $mname = validate($_POST['mname']);
    $lname = validate($_POST['lname']);
    $suffix = validate($_POST['suffix']);
    $age = validate($_POST['age']);
    $birthday = validate($_POST['birthday']);
    $gender = validate($_POST['gender']);
    $relationship_status = validate($_POST['relationship_status']);
    $email = validate($_POST['email']);
    $contact = validate($_POST['contact']);
    $telephone = validate($_POST['telephone']);
    $purok = validate($_POST['purok']);
    $house = validate($_POST['house']);
    $phase = validate($_POST['phase']);
    $block = validate($_POST['block']);
    $lot = validate($_POST['lot']);
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$resident = validate($_POST['resident']);
	$user_data = 'fname='. $fname. '&mname='. $mname . '&lname='. $lname . '&suffix='. $suffix . '&age='. $age . '&birthday='. $birthday . '&gender='. $gender . '&relationship_status='. $relationship_status . '&email='. $email . '&contact='. $contact . '&telephone='. $telephone . '&purok='. $purok . '&house='. $house . '&phase='. $phase . '&block='. $block . '&lot='. $lot . '&uname='. $uname;

if (empty($fname)) {
		header("Location: ../registration.php?error=First Name is required&$user_data");
	    exit();
	   }else if (empty($mname)) {
		header("Location: ../registration.php?error=Middle Name is required&$user_data");
	    exit();
	    }else if (empty($lname)) {
		header("Location: ../registration.php?error=Last Name is required&$user_data");
	    exit();

	    }else if (empty($birthday)) {
		header("Location: ../registration.php?error= Birthday is required&$user_data");
	    exit();

	    }else if (empty($age)) {
		header("Location: ../registration.php?error= Age is required&$user_data");
	    exit();

	    }else if (empty($gender)) {
		header("Location: ../registration.php?error= Gender is required&$user_data");
	    exit();

	    }else if (empty($relationship_status)) {
		header("Location: ../registration.php?error= Relationship Status is required&$user_data");
	    exit();


	     }else if (empty($email)) {
		header("Location: ../registration.php?error= Email Address is required&$user_data");
	    exit();

	     }else if (empty($contact)) {
		header("Location: ../registration.php?error= Contact Number is required&$user_data");
	    exit();

	}else if (empty($uname)) {


		header("Location: ../registration.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: ../registration.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: ../registration.php?error=Re Password is required&$user_data");
	    exit();
	}


	else if($pass !== $re_pass){
        header("Location: ../registration.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name= '$uname'";
		$result = $conn->query($sql);

		if ($result-> num_rows > 0) {
			header("Location: ../registration.php?error=The Username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(oauth_provider, oauth_id,  first_name, middle_name, last_name, name, suffix, age, birthday, gender, relationship_status, email, contact, telephone, purok, house, phase, block, lot, user_name, password, resident, status) VALUES ('$oauth_provider', '$oauth_id', '$fname', '$mname','$lname','$fname $mname $lname','$suffix', '$age', '$birthday', '$gender', '$relationship_status',  '$email', '$contact', '$telephone', '$purok', '$house', '$phase', '$block', '$lot', '$uname', '$pass', '$resident',  '$status')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../registration.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: ../registration.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: ../registration.php");
	exit();
}
}