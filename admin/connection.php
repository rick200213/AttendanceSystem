<?php
$servername='localhost:3306';
// Username is root
$user = 'root';
$password = 'Account1start';
$database = 'attendance';
$mysqli = new mysqli($servername, $user,
				$password, $database);


// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
?>