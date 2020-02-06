<?php session_start(); ob_start();
	INCLUDE "../php/db-connect.php"; 

$FindImg = $connecDB->query("SELECT FileName FROM Images WHERE HotelID = '".$_SESSION['HotelID']."' AND TableRow = '".$_SESSION['BuildingNo']."'");
if(mysqli_num_rows($FindImg) > 0){
    while($row = $FindImg->fetch_array()){
        echo "<img src='\\uploads\\".$row['FileName']."' >";
    }  
}
?>