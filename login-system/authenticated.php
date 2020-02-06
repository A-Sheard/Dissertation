<?php
function isAuthenticated(){

	if(isset($_SESSION['StaffID']) && !empty($_SESSION['StaffID']) &&
		isset($_SESSION['UserName']) && !empty($_SESSION['UserName']) /*&& 
		isset($_SESSION['HotelID']) && !empty($_SESSION['HotelID'])*/){
		return "Success";
	}else{
		header("Location: /login.php");
		die();
	}
}


?>