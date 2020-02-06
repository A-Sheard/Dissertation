<?php 
session_start(); ob_start();
INCLUDE "../php/db-connect.php"; 


$ds = DIRECTORY_SEPARATOR;
 
$storeFolder = '../uploads';

$Table = $_GET['type'];  
$Table = mysqli_real_escape_string($connecDB, $Table); 

$TableID = $_GET['ID'];
$TableID = mysqli_real_escape_string($connecDB, $TableID); 

if(!isset($TableID) || empty($TableID)){
    $TableID = $_SESSION['rownum'];
}

if (!empty($_FILES)) {
    
	$Chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $CharLen = strlen($Chars);
    $FileName = '';
    for ($i = 0; $i < 56; $i++) {
        $FileName .= $Chars[rand(0, $CharLen - 1)];
    } 

    $tempFile = $_FILES['file']['tmp_name'];        
    $FileName .= '.'.substr(mime_content_type($_FILES['file']['tmp_name']), 6) ;        
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     
    $targetFile =  $targetPath. $FileName;
 
    move_uploaded_file($tempFile,$targetFile);

    $AddImg = "INSERT INTO Images (Name, FileName, HotelID, TableName, TableRow,  UploadedBy, Active) VALUES ('".$_FILES['file']['name']."','$FileName', '".$_SESSION['HotelID']."', '$Table', '$TableID', '".$_SESSION['StaffID']."','y')";
		if($connecDB->query($AddImg) === TRUE){
			echo "Success";
			$_SESSION['BuildingNo'] = $Row;
		}

}

?>

