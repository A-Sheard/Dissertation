<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 
	require_once("../email-handler/send-mail.php");

	$Name = $_POST['Name'];
	$Phone = $_POST['Phone']; 
	$Email = $_POST['Email']; 
	$Address = $_POST['Address']; 
	$NumberOfGuests = $_POST['NumberOfGuests']; 
	$CheckinOut = $_POST['CheckinOut'];  
	$RoomType = $_POST['RoomType']; 
	$Extras = $_POST['Extras']; 
	
	
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


        $RoomCost = $connecDB->query("SELECT * FROM RoomTypes WHERE HotelID = '10' AND ID = '$RoomType' ");
        if(mysqli_num_rows($RoomCost) > 0){
        	while($row = $RoomCost->fetch_array()){
        		$CPN = $row['CostPerNight'];
        		$RoomName = $row['Name'];
        	}
        }
        $TotalFee = ($CPN * $Days)*$NumberOfGuests;





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
	        	}
	        }
    	}
    }else{
    	$ExtraNames = ' ';
    	$ExtrasCost = 0;
    }
    $Deposit = ($TotalFee*0.2)+$ExtrasCost;

    echo '<h4><strong>Total Cost: </strong>'.$TotalFee.'</h4><h4><strong>Pay Today: </strong>'.$Deposit.'</h4>';
?>