<?php

	$conn = new mysqli('localhost', 'root', '', 'wbcms_database');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//mysql_select_db('obasystem',mysql_connect('localhost','root',''))or die(mysql_error());
?>
