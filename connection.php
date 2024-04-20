<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "hms";

// Create connection
$connect = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
$connection = $connect;
?>
