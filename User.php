<?php

class OauthUser {
    private $host          = "localhost";
    private $username      = "root";
    private $password      = "";
    private $database_name = "wbcms_database";
    private $table         = 'users';
    private $db;
    
    function __construct(){
    // Connect to the MySQL database
    $this->db = new mysqli($this->host, $this->username, $this->password, $this->database_name);
    if($con->connect_error){
      die("Failed to connect with MySQL database: " . $this->db->connect_error);
    }
    }
  
  
  
  function verifyUser($userInfo) {
    
    $qry_body = "`oauth_provider` = 'facebook',
            `oauth_id`       = '".$userInfo['id']."',
            `name`           = '".$userInfo['name']."',
            `first_name`     = '".$userInfo['first_name']."', 
            `last_name`      = '".$userInfo['last_name']."', 
            `email`          = '".$userInfo['email']."',
            `picture`        = '".$userInfo['picture']['url']."'";
    
    $select_qry = "select * from `users` where `oauth_provider`='facebook' and `oauth_id`= '".$userInfo['id']."'";
    $res = $this->db->query($select_qry);
    if($res->num_rows > 0) {
      //Update user details if it is already exists in the table
            $qry = "update ".$this->table." set ".$qry_body." WHERE `oauth_provider` = 'facebook' AND `oauth_id` = '".$userInfo['id']."'";
    } else {
      //Insert into table if user not exists in the table
            $qry = "insert into ".$this->table." set ".$qry_body.",`created_at`='".date("Y-m-d H:i:s")."',`verify_status`='not_verified'";    
    }
    $this->db->query($qry);
    $_SESSION['status'] = "Active";
    $_SESSION['verify_status'];
    $_SESSION['user_id']      = $userInfo['id'];
    $_SESSION['user_name']    = $userInfo['name'];
    $_SESSION['user_fname']   = $userInfo['first_name'];
    $_SESSION['user_lname']   = $userInfo['last_name'];
    $_SESSION['email']   = $userInfo['email'];
    $_SESSION['picture'] = $userInfo['picture']['url'];
     $_SESSION['created_at']   = $userInfo['created_at'];

     header("location:client/home.php");
    exit();
    }

  }


class User {
	private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "wbcms_database";
    private $userTbl    = 'users';
	
	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
	
	function checkUser($userData = array()){
        if(!empty($userData)){
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_id = '".$userData['oauth_id']."'";
            $prevResult = $this->db->query($prevQuery);
            $_SESSION['status'] = "Active";
            $_SESSION['verify_status'];
            $_SESSION['user_id']      = $userData['oauth_id'];
            $_SESSION['user_fname'] = $userData['first_name'];
            $_SESSION['user_lname'] = $userData['last_name'];
            $_SESSION['email'] = $userData['email'];
            $_SESSION['gender'] = $userData['gender'];
            $_SESSION['picture'] = $userData['picture'];
            header("location:client/home.php");
            if($prevResult->num_rows > 0){
                //Update user data if already exists
                $query2 = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_id = '".$userData['oauth_id']."'";
                $update = $this->db->query($query);
            }else{
                //Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_id = '".$userData['oauth_id']."', name = '".$userData['first_name']."' '".$userData['last_name']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', picture = '".$userData['picture']."',`verify_status`='not_verified' ";
                $this->db->query($query);
                $_SESSION['status'] = "Active";
                $_SESSION['verify_status'];
                $_SESSION['user_id']      = $userData['oauth_id'];
                $_SESSION['user_fname'] = $userData['first_name'];
                $_SESSION['user_lname'] = $userData['last_name'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['gender'] = $userData['gender'];
                $_SESSION['picture'] = $userData['picture'];
                header("location:client/home.php");
                exit();
            }
            
            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        //Return user data
        return $userData;
    }
}
?>