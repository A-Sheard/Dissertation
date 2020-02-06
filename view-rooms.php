<?php session_start(); ob_start(); INCLUDE "php/db-connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Booking System</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--bootstrap -->
    
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/material/material.min.css">
	<link rel="stylesheet" href="css/material_style.css">
	<!-- Theme Styles -->
    <link href="css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />	
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="css/formlayout.css" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/theme-color.css" rel="stylesheet" type="text/css" />

    <!--fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
		<?php INCLUDE "page-builder/header.php"; 
        $BuildingNo = $_GET['building'];?>
        <!-- end header -->
        <!-- start color quick setting -->
         
		<!-- end color quick setting -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
             
             <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper" style="margin-top: 120px;">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">All Buildings</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li> 
                                <li class="active">All Buildings</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>
<?php 
if(isset($BuildingNo) && !empty($BuildingNo)){ 
    $BuildingSet = 'y';
    $FindBuilding = $connecDB->query("SELECT Name FROM Buildings WHERE ID = '$BuildingNo'"); 
    while($row = $FindBuilding->fetch_array()){
        echo "Rooms in <strong>".$row['Name']; 
    }
}else{
    $BuildingSet = 'n';
    echo "All Rooms";
}
?>
                                        </strong>
                                    </header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                     
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="example4">
                                        <thead>
                                            <tr> 
                                                <th>Room Number</th>
                                                <th>Room Type</th>
                                                <th>Occupied?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$AllRooms = 0;
if(isset($BuildingNo) && !empty($BuildingNo)){ 
    $FindRooms = $connecDB->query("SELECT RoomNumbers.RoomNo AS RoomNo, RoomTypes.Name AS Name FROM RoomNumbers 
                                INNER JOIN RoomTypes ON RoomTypes.ID = RoomNumbers.RoomID
                                WHERE RoomNumbers.hotelID = '".$_SESSION['HotelID']."' AND RoomNumbers.BuildingID = '$BuildingNo' ORDER BY RoomNo");
}else{
    $FindRooms = $connecDB->query("SELECT RoomNumbers.RoomNo AS RoomNo, RoomTypes.Name AS Name, RoomNumbers.BuildingID AS Building FROM RoomNumbers 
                                INNER JOIN RoomTypes ON RoomTypes.ID = RoomNumbers.RoomID
                                WHERE RoomNumbers.hotelID = '".$_SESSION['HotelID']."' ORDER BY RoomNo");
}
    if(mysqli_num_rows($FindRooms) > 0){
        while($row = $FindRooms->fetch_array()){
            
            if($BuildingSet == 'n'){
                $BuildingNo = $row['Building'];
            }
            $Room = $row['RoomNo'];
            $RoomName = $row['Name'];
            $AllRooms ++;
 ?>                                         
                                            <tr class="odd gradeX">
                                                <td><?php echo $Room; ?></td>
                                                <td><?php echo $RoomName; ?></td>
                                                <td>
<?php 
$FindOccupancy = $connecDB->query("SELECT Bookings.ID FROM BookingRooms 
                                    INNER JOIN RoomNumbers ON RoomNumbers.RoomNo = BookingRooms.RoomNo 
                                    INNER JOIN Bookings ON BookingRooms.BookingID = Bookings.ID 
                                    WHERE Bookings.CheckinDate <= now() && Bookings.CheckoutDate >= now() AND RoomNumbers.RoomNo = '$Room' AND RoomNumbers.HotelID = '".$_SESSION['HotelID']."' AND RoomNumbers.BuildingID = '$BuildingNo'");
if(mysqli_num_rows($FindOccupancy) > 0){
        while($row = $FindOccupancy->fetch_array()){
            echo 'Yes';
        }

    }else{
        echo "No"; 
    }
    ?>
                                                </td>  
                                            </tr>
<?php 
    }
}else{
?>
                                            <tr class="odd gradeX">
                                                <td class="center" colspan="3">This building is empty</td>
                                            </tr>
<?php 
}
?>                                  
                                            
                                             
                                             
                                             
                                             
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="info-box bg-orange">
                                <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Full Rooms</span>
                                  <span class="info-box-number">
<?php 
$CountGuests = $connecDB->query("SELECT COUNT(ID) AS count FROM Bookings 
                            INNER JOIN  BookingRooms ON BookingRooms.BookingID = Bookings.ID 
                            WHERE (Bookings.CheckinDate < now() AND Bookings.CheckoutDate > now()) AND Bookings.HotelID = '".$_SESSION['HotelID']."'");
if(mysqli_num_rows($CountGuests) > 0){
while($row = $CountGuests->fetch_array()){
    $Occupied = $row['count'];
    echo $Occupied;
}
}else{
echo "0";
}
?>
        
                                    </span>
                                  <div class="progress">
                                    <div class="progress-bar" style="width: <?php echo ($Occupied / $AllRooms)*100; ?>%"></div>
                                  </div> 
                                </div>
                                <!-- /.info-box-content --> 
                              <!-- /.info-box -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
        <!-- <?php INCLUDE "page-builder/footer.php"; ?> -->
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="assets/jquery.min.js" ></script>
<script type="text/javascript">
    window._mfq = window._mfq || [];
    (function() {
        var mf = document.createElement("script");
        mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/0ce82da7-d997-4491-a65f-f82d74efdecb.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
    })();
</script>
    <script src="assets/popper/popper.js" ></script>
    <script src="assets/jquery.blockui.min.js" ></script>
    <script src="assets/jquery-validation/js/jquery.validate.min.js" ></script>
    <script src="assets/jquery-validation/js/additional-methods.min.js" ></script>
    <script src="assets/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <script src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"  charset="UTF-8"></script>
    <script src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js"  charset="UTF-8"></script>
    <!-- Common js-->
	<script src="assets/app.js" ></script>
    <script src="assets/form-validation.js" ></script>
    <script src="assets/layout.js" ></script>
	<script src="assets/theme-color.js" ></script>
	<!-- Material -->
	<script src="assets/material/material.min.js"></script>
     <!-- end js include path -->
</body>
</html>