<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 

	$Name = $_POST['name'];
	$Description = $_POST['description']; 
	$Single = $_POST['single']; 
	$Double = $_POST['double']; 
	$Sleeps = $_POST['sleeps']; 

	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$Name = mysqli_real_escape_string($connecDB,$Name);
		$Description = mysqli_real_escape_string($connecDB,$Description); 
		$Single = mysqli_real_escape_string($connecDB,$Single); 
		$Double = mysqli_real_escape_string($connecDB,$Double); 
		$Sleeps = mysqli_real_escape_string($connecDB,$Sleeps); 

		if(isset($Name) && !empty($Name) ){

			$InsertLogin = "INSERT INTO RoomTypes (HotelID, Name, Description, Created, CreatedBy, SingleBeds, DoubleBeds, Sleeps) VALUES ('".$_SESSION['HotelID']."','$Name', '$Description', now(), '".$_SESSION['StaffID']."', '$Single', '$Double', '$Sleeps')";
			if($connecDB->query($InsertLogin) === TRUE){
				echo "Success"; 
			}

		}else{
			echo "Somethings not quite right.";
		}
	}


?>