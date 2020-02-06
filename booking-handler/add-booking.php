<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 

	$Name = $_POST['Name'];
	$Phone = $_POST['Phone']; 
	$Email = $_POST['Email']; 
	$Address = $_POST['Address']; 
	$Checkin = $_POST['Checkin']; 
	$Checkout = $_POST['Checkout']; 
	$RoomType = $_POST['RoomType']; 
	$NumberOfRooms = $_POST['NumberOfRooms']; 
	$NumberOfGuests = $_POST['NumberOfGuests']; 

	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$Name = mysqli_real_escape_string($connecDB,$Name);
		$Phone = mysqli_real_escape_string($connecDB,$Phone); 
		$Email = mysqli_real_escape_string($connecDB,$Email);  
		$Address = mysqli_real_escape_string($connecDB,$Address); 
		$Checkin = date('Y-m-d',strtotime( str_replace('/', '-', mysqli_real_escape_string($connecDB,$Checkin)))); 
		$Checkout = date('Y-m-d',strtotime( str_replace('/', '-', mysqli_real_escape_string($connecDB,$Checkout)))); 
		$RoomType = mysqli_real_escape_string($connecDB,$RoomType); 
		$NumberOfRooms = mysqli_real_escape_string($connecDB,$NumberOfRooms); 
		$NumberOfGuests = mysqli_real_escape_string($connecDB,$NumberOfGuests); 


		if(isset($Name) && !empty($Name) 
	 	&& isset($Phone) && !empty($Phone)
		&& isset($Email) && !empty($Email)
		&& isset($Address) && !empty($Address)
		&& isset($Checkin) && !empty($Checkin)
		&& isset($Checkout) && !empty($Checkout)
		
		&& isset($NumberOfRooms) && !empty($NumberOfRooms)
		&& isset($NumberOfGuests) && !empty($NumberOfGuests)){

			$InsertGuest = "INSERT INTO Guests (Email, Name, Phone, Address) VALUES ('$Email','$Name', '$Phone', '$Address')";
			if($connecDB->query($InsertGuest) === TRUE){
				$GuestID = $connecDB->insert_id;

				$InsertBooking = "INSERT INTO Bookings (HotelID, StaffID, DateBooked, NumberOfGuests, CheckinDate, CheckoutDate, NumberOfRooms, GuestID) VALUES ('".$_SESSION['HotelID']."','".$_SESSION['StaffID']."', now(), '$NumberOfGuests', '$Checkin', '$Checkout', '$NumberOfRooms', '$GuestID')";
				if($connecDB->query($InsertBooking) === TRUE){
					$BookingID = $connecDB->InsertBooking;

					$FindRoom = "INSERT INTO BookingRooms (BookingID, RoomNo) VALUES ('$BookingID', (SELECT RoomNo FROM RoomNumbers WHERE HotelID = '".$_SESSION['HotelID']."' "




					echo "Success"; 
				}else{
					echo "Your booking has not been placed, but your contact details have been recieved.";
				}

			}else{
				echo "Somethings gone wrong, your booking has not been placed."; 
			}
		}else{
			echo "Check your inputs and try again<br>".$Name."<BR>".$Phone."<BR>".$Email."<BR>".$Address."<BR>".$Checkin."<BR>".$Checkout."<BR>".$NumberOfRooms."<BR>".$NumberOfGuests."<BR>";
		}

	}

?>