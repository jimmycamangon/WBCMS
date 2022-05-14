<?php
    include 'conn.php';
    include '../User.php';


if($_SESSION['online']!="Active") {
    header("location:../login.php");
}

$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user_id']."'";
$query = $conn->query($sql);
$user = $query->fetch_assoc();


?>