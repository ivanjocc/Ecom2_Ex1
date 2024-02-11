<?php

$servername = "localhost";
$database = "ecom2_ex1";
$username = "root";
$password = "";


// create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
	die('connection failed ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8')

?>