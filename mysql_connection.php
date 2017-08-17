<?php 
	require 'mysql_data.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
    	die("Connection failed: " . $conn->connect_error);
	}
?>