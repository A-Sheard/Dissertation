<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 

	$Name = $_POST['name'];
	$Description = $_POST['description']; 
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$Name = mysqli_real_escape_string($connecDB,$Name);
		$Description = mysqli_real_escape_string($connecDB,$Description); 

		$ExistanceCheck = $connecDB->query("SELECT ID FROM Buildings WHERE Name = '$Name'");
		if(mysqli_num_rows($ExistanceCheck) > 0){
			echo "A building with this name already exists.";
		}else{

			$InsertLogin = "INSERT INTO Buildings (HotelID, Name, Description, Created, CreatedBy) VALUES ('".$_SESSION['HotelID']."','$Name', '$Description', now(), '".$_SESSION['StaffID']."')";
			if($connecDB->query($InsertLogin) === TRUE){
				echo $connecDB->insert_id;
				$_SESSION['rownum'] = $connecDB->insert_id;
			}
		}
	}


?>