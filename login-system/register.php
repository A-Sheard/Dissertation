<?php
	INCLUDE "../php/db-connect.php"; 

	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Pass = $_POST['password'];
	$PassConf = $_POST['passwordconf'];
	$HotelName = $_POST['hotelname'];
	$HotelEmail = $_POST['hotelemail'];
	$HotelPhone = $_POST['hotelphone'];
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$Name = mysqli_real_escape_string($connecDB,$Name);
		$Email = mysqli_real_escape_string($connecDB,$Email);
		$Pass = mysqli_real_escape_string($connecDB,$Pass);
		$PassConf = mysqli_real_escape_string($connecDB,$PassConf);
		$HotelName = mysqli_real_escape_string($connecDB,$HotelName);
		$HotelEmail = mysqli_real_escape_string($connecDB,$HotelEmail);
		$HotelPhone = mysqli_real_escape_string($connecDB,$HotelPhone);

//check entered variables are of correct data types
		if($Pass == $PassConf && filter_var($Email, FILTER_VALIDATE_EMAIL) && !empty($Name) && preg_match("/^[a-zA-Z ]*$/",$Name) && preg_match("/^[0-9., ]*$/",$HotelPhone)){
//check the user hasnt already registered with that email
			$ExistanceCheck = $connecDB->query("SELECT ID FROM Logins WHERE Email = '$Email'");
			if(mysqli_num_rows($ExistanceCheck) > 0){
				echo "An account with this email address alredy exists";
			}else{

				$SafePass = password_hash($Pass, PASSWORD_DEFAULT);
//insert user into Logins table
				$InsertLogin = "INSERT INTO Logins (Name, Email, Password,Created) VALUES ('$Name','$Email', '$SafePass', now())";
			    if($connecDB->query($InsertLogin) === TRUE){
//insert hotel into Hotels table			 		
				    $InsertHotel = "INSERT INTO Hotels (Name, Phone, Email,Created) VALUES ('$HotelName','$HotelPhone', '$HotelEmail', now())";
				    if($connecDB->query($InsertHotel) === TRUE){

				    	$HotelID = $connecDB->insert_id;
//inserts HotelID into Logins table
				    	$InsertHotelID = "UPDATE Logins SET HotelID = '$HotelID' WHERE Email = '$Email'";
				    	if($connecDB->query($InsertHotelID) === TRUE){
				    		echo "Success"; 
				    	}
				    }else{
				    	echo "Hotel SQL failure";
				    }
				}else{
					echo "Login SQL failure";
				}
			}
		}else{
			echo "Invalid input";
		}
	}


?>