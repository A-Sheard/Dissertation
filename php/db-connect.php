<?php 
session_start();
$db_host ="localhost";
$db_username ="theadams_admin";
$db_password ="(*31[d8QD@!1";
$db_name ="theadams_HotelSystem";

$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database aaaagh');
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
