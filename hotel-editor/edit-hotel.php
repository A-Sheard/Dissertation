<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 

	$Name = $_POST['name'];
	$Email = $_POST['email']; 
	$Phone = $_POST['phone']; 
	$Address = $_POST['address']; 
	$Website = $_POST['website']; 
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$Name = mysqli_real_escape_string($connecDB,$Name);
		$Email = mysqli_real_escape_string($connecDB,$Email); 
		$Phone = mysqli_real_escape_string($connecDB,$Phone); 
		$Address = mysqli_real_escape_string($connecDB,$Address); 
		$Website = mysqli_real_escape_string($connecDB,$Website); 

		$UpdateHotel = "UPDATE Hotels SET Email = '$Email', Phone = '$Phone', Address = '$Address', Website = '$Website' WHERE ID = '".$_SESSION['HotelID']."'";

		if($connecDB->query($UpdateHotel) === TRUE){
			echo "Success";
		}else{
			echo "Oops something went wrong.";
		}
		
	}


?>