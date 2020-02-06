<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 

	$Name = $_POST['name']; 
	$Email = $_POST['email']; 
	$Start = $_POST['start']; 
	$End = $_POST['end']; 
	$Privilege = implode($_POST['privileges']);
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$Name = mysqli_real_escape_string($connecDB,$Name);
		$Email = mysqli_real_escape_string($connecDB,$Email);
		$Start = mysqli_real_escape_string($connecDB,$Start);
		$End = mysqli_real_escape_string($connecDB,$End);
		$Privilege = mysqli_real_escape_string($connecDB,$Privilege); 

		$Privilege = str_replace('switch-', '', $Privilege);

		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
			$Return .= "Invalid Email Address. " . $Email;
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {
			$Return .= "Invalid Name";
		}
		if (!preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/",$Start)) {
			$Return .= "Invalid Start Date";
		}else{
			$Start = date('Y-m-d',strtotime(str_replace('/', '-', $Start)));
		}
		if (!preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$/",$End) && !empty($End)) {
			$Return .= "Invalid End Date";
		}else{
			$End = date('Y-m-d',strtotime(str_replace('/', '-', $End)));
		}

		$SafePass = password_hash('Password123', PASSWORD_DEFAULT);

		if(empty($Return) || !isset($Return)){

			$InsertLogin = "INSERT INTO Logins (HotelID, Name, Password, Email, ActiveFrom, ActiveUntil, Created, CreatedBy, Privileges) VALUES ('".$_SESSION['HotelID']."','$Name', '$SafePass', '$Email', '$Start', '$End', now(), '".$_SESSION['StaffID']."',  '$Privilege')";
			if($connecDB->query($InsertLogin) === TRUE){
				echo "Success<br>".$Privilege;
			}else{
				echo "failed to connect to db";
			}

		}else{
			echo $Return;
		}
/*
		$ExistanceCheck = $connecDB->query("SELECT ID FROM Logins WHERE Email = '$Email'");
		if(mysqli_num_rows($ExistanceCheck) > 0){
			echo "A building with this name already exists.";
		}else{

			$InsertLogin = "INSERT INTO Buildings (HotelID, Name, Description, Created, CreatedBy) VALUES ('".$_SESSION['HotelID']."','$Name', '$Description', now(), '".$_SESSION['StaffID']."')";
			if($connecDB->query($InsertLogin) === TRUE){
				echo "Success";
			}
		}*/
	}


?>