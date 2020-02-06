<?php 
session_start(); ob_start();
INCLUDE "../php/db-connect.php"; 

$DeleteMe = $_POST['deleteMe'];
$DeleteMe = mysqli_real_escape_string($connecDB, $DeleteMe);


$PermissionCheck = $connecDB->query("SELECT ID FROM Images WHERE ID = '$DeleteMe' AND HotelID = '".$_SESSION['HotelID']."'");
if(!(mysqli_num_rows($PermissionCheck) > 0)){
	echo "Oops! You can't delete that image.";
}else{
	$RemoveImg = $connecDB->query("UPDATE Images SET Active = 'n' WHERE ID = '$DeleteMe' AND HotelID = '".$_SESSION['HotelID']."'");
	if(mysqli_affected_rows($connecDB) > 0 ){
		echo "success";

	}else{
		echo "Oops, something has gone wrong. Please try again.";
	}
}


?>