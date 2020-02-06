<?php
	session_start();
	INCLUDE "../php/db-connect.php"; 
 
	$Email = $_POST['email'];
	$Pass = $_POST['pass']; 
 
	$Email = mysqli_real_escape_string($connecDB,$Email);
	$Pass = mysqli_real_escape_string($connecDB,$Pass); 
 
 
 
 	    $FindAccount = $connecDB->query("SELECT * FROM Logins WHERE Email = '$Email'");
		if(mysqli_num_rows($FindAccount) > 0){
			while($row = $FindAccount->fetch_array()){

				if(password_verify($Pass, $row['Password'])){
					$_SESSION['StaffID'] = $row['ID'];
					$_SESSION['UserName'] = $row['Name'];
					$_SESSION['HotelID'] = $row['HotelID'];

					$FindHotel = $connecDB->query("SELECT * FROM Hotels WHERE ID = '".$_SESSION['HotelID']."' LIMIT 1");
					if(mysqli_num_rows($FindHotel) > 0){
						while($row = $FindHotel->fetch_array()){
							$_SESSION['HotelName'] = $row['Name'];
							echo "Success";
						}
					}else{
						echo "Couldnt find your hotel, please contact a system administrator.";
					}
				}else{
					echo "incorrect Password!";
				}
			}
		}else{
			echo "Wrong password! " . $SafePass;
		}



?>