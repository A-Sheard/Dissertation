<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 
	require_once("../email-handler/send-mail.php");
	require_once('../vendor/autoload.php');
	\Stripe\Stripe::setApiKey('sk_test_o0pzORcgY7CRabjnjImjkWbi');

	$Name = $_POST['Name'];
	$Phone = $_POST['Phone']; 
	$Email = $_POST['Email']; 
	$Address = $_POST['Address']; 
	$NumberOfGuests = $_POST['NumberOfGuests']; 
	$CheckinOut = $_POST['CheckinOut'];  
	$RoomType = $_POST['RoomType']; 
	$Extras = $_POST['Extras']; 
	
	$Token = $_POST['StripeToken'];
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$Name = mysqli_real_escape_string($connecDB,$Name);
		$Phone = mysqli_real_escape_string($connecDB,$Phone); 
		$Email = mysqli_real_escape_string($connecDB,$Email);  
		$Address = mysqli_real_escape_string($connecDB,$Address); 
		$CheckinOut = mysqli_real_escape_string($connecDB,$CheckinOut); 
		$RoomType = mysqli_real_escape_string($connecDB,$RoomType);  
		$NumberOfGuests = mysqli_real_escape_string($connecDB,$NumberOfGuests);   


		$RoomType = substr($RoomType, 5);
		$StayDates = explode(' - ', $CheckinOut);
		$CheckIn = strtotime(str_replace('/', '-', $StayDates[0]));
		$CheckOut = strtotime(str_replace('/', '-', $StayDates[1]));
		$Duration = abs($CheckIn - $CheckOut);

		$CheckInDate = date('d/m/Y', $CheckIn);
		$CheckOutDate = date('d/m/Y', $CheckOut);

		$Days = floor($Duration / (60*60*24)); 



		if(isset($Name) && !empty($Name) 
	 	&& isset($Phone) && !empty($Phone)
		&& isset($Email) && !empty($Email)
		&& isset($Address) && !empty($Address)
		&& isset($CheckinOut) && !empty($CheckinOut)
		&& isset($RoomType) && !empty($RoomType)
		&& isset($NumberOfGuests) && !empty($NumberOfGuests)) {

	        $RoomCost = $connecDB->query("SELECT * FROM RoomTypes WHERE HotelID = '10' AND ID = '$RoomType' ");
	        if(mysqli_num_rows($RoomCost) > 0){
	        	while($row = $RoomCost->fetch_array()){
	        		$CPN = $row['CostPerNight'];
	        		$RoomName = $row['Name'];
	        	}
	        }
	        $TotalFee = $CPN * $Days*$NumberOfGuests;





	        $RoomCost = $connecDB->query("SELECT Name FROM Hotels WHERE ID = '10'");
	        if(mysqli_num_rows($RoomCost) > 0){
	        	while($row = $RoomCost->fetch_array()){
	        		$Hotel = $row['Name'];
	        	}
	        }
	        if(isset($Extras) && !empty($Extras)){
		        foreach ($Extras as $Key => $value) {
		        	$SafeVal = substr(mysqli_real_escape_string($connecDB, $value),6);
			        $RoomCost = $connecDB->query("SELECT * FROM Extras WHERE HotelID = '10' AND ID = '$SafeVal'");
			        if(mysqli_num_rows($RoomCost) > 0){
			        	while($row = $RoomCost->fetch_array()){
			        		if($row['Pricing'] == 1){
			        			$ExtrasCost += ($Days * $row['Cost']);
			        		}elseif($row['Pricing'] == 2){
			        			$ExtrasCost += $row['Cost'];
			        		} 
			        		if($Key % 2 == 0){
			        			$ExtraNames .= 
								        '<div style="padding-left:4%; width: 45%;display:inline-block; ">
									        <div style="display: inline-block;color:#000;">
									            <h3>Extras:</h3>
									        </div>
									        <div style="display: inline-block;color:#000;">
									            '. $row['Name'] . '
									        </div>
									    </div>';
			        		}else{
				        		$ExtraNames .= 
								        '<div style="width: 45%;display:inline-block; ">
									        <div style="display: inline-block;color:#000;">
									            <h3>Extras:</h3>
									        </div>
									        <div style="display: inline-block;color:#000;">
									            '. $row['Name'] . '
									        </div>
									    </div>';
							}
			        	}
			        }
		    	}
		    }else{
		    	$ExtraNames = ' ';
		    	$ExtrasCost = 0;
		    }

	    	try{

				$charge = \Stripe\Charge::create(
				    array(
				        'amount' => round((($TotalFee*0.2)+$ExtrasCost) * 100),
				        'currency' => 'gbp',
				        'source' => $Token
				    )
				);
			}catch(Exception $e){

				error_log("unable to sign up customer:".$_SESSION['AccessEmail'].", error:" . $e->getMessage());
				echo "Oops, something has gone wrong with the payment method. Please refresh the page and try again.";    
				//exit;                
			}

	        $EmailBody = '
    <div style="padding-left:4%; width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Hotel:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $Hotel .'
        </div>
    </div>
       <div style=" width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Room Type:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $RoomName .'
        </div>
    </div>
    <div style="padding-left:4%;width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Check In:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $CheckInDate .'
        </div>
    </div>
    <div style=" width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Check Out:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $CheckOutDate .'
        </div>
    </div>
    <div style="padding-left:4%;width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Stay Duration:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $Days .'
        </div>
    </div>
    <div style=" width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Party Size:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $NumberOfGuests .'
        </div>
    </div>
    <div style="padding-left:4%; width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Room Type:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $RoomName .'
        </div>
    </div>
    <div style="width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Total Cost:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            £'. $TotalFee .'
        </div>
    </div>
    <hr>
    <h2 style="color:#000;padding-left:4%;">Your Details</h2>
    <div style="padding-left:4%; width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Name:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $Name .'
        </div>
    </div>
    <div style="width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Phone Number:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $Phone .'
        </div>
    </div>
    <div style="padding-left:4%; width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Email:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $Email .'
        </div>
    </div>
    <div style="width: 45%;display:inline-block; ">
        <div style="display: inline-block;color:#000;">
            <h3>Address:</h3>
        </div>
        <div style="display: inline-block;color:#000;">
            '. $Address .'
        </div>
    </div>
	'. $ExtraNames;

/*
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

			*/
			//echo $ExtraNames;
			echo 'Success';
			//sendEmail($Email,$Name,'no-reply@theadamsheard.co.uk','Adams Crib','New Booking',$EmailBody);
		}else{
			//echo "Fail " . $Name . " " . $Email . " " . $NumberOfGuests . " " . $Phone . " " . $Address;
			echo "Fail";
		}

	}else{
		echo "not a post you cheeky you";
	}

?>