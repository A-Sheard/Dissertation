<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 

	$BuildingID = $_POST['BuildingID'];
	$RoomID = $_POST['RoomID']; 
	$RoomNo = $_POST['RoomNo'];  

	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$BuildingID = mysqli_real_escape_string($connecDB,$BuildingID);
		$RoomID = mysqli_real_escape_string($connecDB,$RoomID); 
		$RoomNo = mysqli_real_escape_string($connecDB,$RoomNo);  


		$PermissionCheck = $connecDB->query("SELECT ID FROM RoomTypes WHERE ID = '$RoomID' AND HotelID = '".$_SESSION['HotelID']."' AND (ActiveUntil = '0000-00-00 00:00:00' OR ActiveUntil > now())");
		if(mysqli_num_rows($PermissionCheck) > 0){
			
			$PermissionCheck = $connecDB->query("SELECT ID FROM Buildings WHERE ID = '$BuildingID' AND HotelID = '".$_SESSION['HotelID']."' AND (ActiveUntil = '0000-00-00 00:00:00' OR ActiveUntil > now())");
			if(mysqli_num_rows($PermissionCheck) > 0){

				$ExistanceCheck = $connecDB->query("SELECT RoomID FROM RoomNumbers WHERE RoomNo = '$RoomNo' AND BuildingID = '$BuildingID' AND HotelID = '".$_SESSION['HotelID']."' AND (ActiveUntil = '0000-00-00 00:00:00' OR ActiveUntil > now())");
				if(mysqli_num_rows($ExistanceCheck) == 0){

					$AddRoom = "INSERT INTO RoomNumbers (RoomNo, HotelID, RoomID, BuildingID, Created, CreatedBy) VALUES ('$RoomNo','".$_SESSION['HotelID']."', '$RoomID', '$BuildingID', now(), '".$_SESSION['StaffID']."')";
					if($connecDB->query($AddRoom) === TRUE){
						$PrintMe .= "success";
					}else{
						$PrintMe .= "SQL Error";
					}
				}else{
					$PrintMe .= "This room already exists";
				}

			}else{
				$PrintMe .= "You can not add a room to this building";
			}
		}else{
			//fail
			$PrintMe .= "You can not add this room,".$BuildingID.",".$RoomID.",".$RoomNo; 
/*
			$InsertLogin = "INSERT INTO Buildings (HotelID, Name, Description, Created, CreatedBy) VALUES ('".$_SESSION['HotelID']."','$Name', '$Description', now(), '".$_SESSION['StaffID']."')";
			if($connecDB->query($InsertLogin) === TRUE){
				echo $connecDB->insert_id;
				$_SESSION['rownum'] = $connecDB->insert_id;
			}*/
		}



	} 
	echo $PrintMe;
?>