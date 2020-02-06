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
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--bootstrap -->
    
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/material/material.min.css">
	<link rel="stylesheet" href="css/material_style.css">
	<!-- Theme Styles -->
    <link href="css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" /> 

    <!--fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->

<?php 
INCLUDE "login-system/authenticated.php"; 
if( isAuthenticated() ==  "Success" ){ 

INCLUDE "page-builder/header.php";?>
        <!-- end header -->
        <!-- start color quick setting -->
         
		<!-- end color quick setting -->
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			 
            <!-- end sidebar menu --> 
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                   <!-- start widget -->
					<div class="state-overview">
							<div class="row">
						        <div class="col-xl-4 col-md-4 col-xs-12">
						          <div class="info-box bg-blue">
						            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
						            <div class="info-box-content">
						              	<span class="info-box-text">Current Guests</span>
						              	<span class="info-box-number">
<?php 
$CountGuests = $connecDB->query("SELECT SUM(NumberOfGuests) AS countid FROM Bookings WHERE (CheckinDate < now() AND CheckoutDate > now()) AND HotelID = '".$_SESSION['HotelID']."'");
if(isset($row['countid']) && !empty($row['countid'])){
    while($row = $CountGuests->fetch_array()){
        echo $row['count'];
    }
}else{
    echo "0";
}
 ?>
			
										</span>
						              	<div class="progress">
						                	<div class="progress-bar" style="width: 45%"></div>
						              	</div> 
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="col-xl-4 col-md-4 col-xs-12">
						          <div class="info-box bg-orange">
						            <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Full Rooms</span>
						              <span class="info-box-number">
<?php /*
$CountGuests = $connecDB->query("SELECT COUNT(BookingRooms.RoomID) AS count FROM Bookings 
								INNER JOIN  BookingRooms ON BookingRooms.BookingID = Bookings.ID 
								WHERE (Bookings.CheckinDate < now() AND Bookings.CheckoutDate > now()) AND Bookings.HotelID = '".$_SESSION['HotelID']."'");
if(mysqli_num_rows($CountGuests) > 0){
    while($row = $CountGuests->fetch_array()){
        echo $row['count'];
    }
}else{
	echo "0";
}*/
 ?>
			
										</span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 40%"></div>
						              </div> 
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="col-xl-4 col-md-4 col-xs-12">
						          <div class="info-box bg-purple">
						            <span class="info-box-icon push-bottom"><i class="material-icons">content_cut</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Empty Rooms</span>
						              <span class="info-box-number"><?php echo "15"; ?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 85%"></div>
						              </div> 
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						         
						        <!-- /.col -->
						      </div>
						</div>
					<!-- end widget -->
					<div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Todays <strong>Check ins</strong></header>
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
                                                <th>Guest</th>
                                                <th>Contact No.</th>
                                                <th>Party Size</th>
                                                <th>Room Type(s)</th> 
                                                <th>Status</th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$CountGuests = $connecDB->query("SELECT * FROM Bookings 
								INNER JOIN  BookingRooms ON BookingRooms.BookingID = Bookings.ID 
								INNER JOIN Guests ON Guests.ID = Bookings.GuestID 
								WHERE DATE(Bookings.CheckinDate) = DATE(NOW()) AND Bookings.HotelID = '".$_SESSION['HotelID']."'");
if(mysqli_num_rows($CountGuests) > 0){
    while($row = $CountGuests->fetch_array()){
 ?>                                   
                                            <tr class="odd gradeX" style="<?php if($row['Status'] == 'checkedin'){echo 'background-color: #c6ffbe;';}else if($row['Status'] == 'cancelled'){echo 'background-color: #ffbcbc;';} ?>">
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><a href="<?php echo $row['Phone']; ?>"><?php echo $row['Phone']; ?></a></td>
                                                <td><?php echo $row['NumberOfGuests']; ?></td>
                                                <td><?php echo $row['RoomID']; ?></td>
                                                <td><?php echo $row['Status']; ?></td>
                                                 
                                                 
                                                <td class="center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-warning dropdown-toggle center no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:;"> Check in </a>
                                                            </li> 
                                                            <li>
                                                                <a href="javascript:;"> Cancellation </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
<?php 
	}
}else{
?>
											<tr class="odd gradeX">
                                                <td class="center" colspan="6">No guests to check in today</td>
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
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Todays <strong>Check outs</strong></header>
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
                                                <th>Guest</th>
                                                <th>Contact No.</th>
                                                <th>Room Type(s)</th> 
                                                <th>Status</th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$CountGuests = $connecDB->query("SELECT * FROM Bookings 
                                INNER JOIN  BookingRooms ON BookingRooms.BookingID = Bookings.ID 
                                INNER JOIN Guests ON Guests.ID = Bookings.GuestID 
                                WHERE DATE(Bookings.CheckoutDate) = DATE(NOW()) AND Bookings.HotelID = '".$_SESSION['HotelID']."'");
if(mysqli_num_rows($CountGuests) > 0){
    while($row = $CountGuests->fetch_array()){
 ?>                                        	
                                            <tr class="odd gradeX" style="<?php if($row['Status'] == 'checkedout'){echo 'background-color: #c6ffbe;';}else if($row['Status'] == 'cancelled'){echo 'background-color: #ffbcbc;';} ?>">
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><a href="<?php echo $row['Phone']; ?>"><?php echo $row['Phone']; ?></a></td>
                                                <td><?php echo $row['RoomID']; ?></td>
                                                <td><?php echo $row['Status']; ?></td>
                                                 
                                                 
                                                <td class="center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-warning dropdown-toggle center no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:;"> Check Out </a>
                                                            </li> 
                                                            <li>
                                                                <a href="javascript:;"> Cancellation </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
<?php 
	}
}else{
?>
											<tr class="odd gradeX">
                                                <td class="center" colspan="5">No guests to check out today</td>
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
                    </div>
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>All Guests</header>
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
                                                <th>Guest</th>
                                                <th>Contact No.</th>
                                                <th>Check in</th> 
                                                <th>Check out</th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$CountGuests = $connecDB->query("SELECT Bookings.CheckinDate AS CheckinDate, 
                                        Bookings.CheckoutDate AS CheckoutDate, 
                                        Guests.Name AS GuestName,
                                        Guests.Phone AS Phone,
                                        Guests.Email AS Email,
                                        Guests.Address AS Address,
                                        Bookings.ID AS ID,
                                        Bookings.NumberOfGuests AS NumberOfGuests,
                                        RoomTypes.Name AS RoomName
                                FROM Bookings
                                INNER JOIN  BookingRooms ON BookingRooms.BookingID = Bookings.ID 
                                INNER JOIN Guests ON Guests.ID = Bookings.GuestID 
                                INNER JOIN RoomTypes ON Bookings.RoomTypeID = RoomTypes.ID
                                WHERE Bookings.CheckinDate <= NOW() AND Bookings.CheckoutDate >= NOW() AND Bookings.HotelID = '".$_SESSION['HotelID']."'");
if(mysqli_num_rows($CountGuests) > 0){
    while($row = $CountGuests->fetch_array()){
 ?>                                         
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['GuestName']; ?></td>
                                                <td><a href="<?php echo $row['Phone']; ?>"><?php echo $row['Phone']; ?></a></td>
                                                <td><?php echo date('d/m/Y',strtotime($row['CheckinDate'])); ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($row['CheckoutDate'])); ?></td>
                                                 
                                                 
                                                <td class="center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-warning dropdown-toggle center no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['ID']; ?>">View Booking</a>
                                                            </li>
                                                            <!-- 
                                                            <li>
                                                                <a href="javascript:;"> Add Extra </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Cancellation </a>
                                                            </li>
                                                            -->
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

<div class="modal fade" id="exampleModalCenter<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Viewing <?php echo $row['GuestName']; ?>'s Booking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Booking Information: </h3>
                
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h4>Room type</h4> 
                         <p><?php echo $row['RoomName']; ?></p>
                    </div>  
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h4>Party size</h4> 
                         <p><?php echo $row['NumberOfGuests']; ?></p>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h4>Check in date</h4> 
                         <p><?php echo $row['CheckinDate']; ?></p>
                    </div>  
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h4>Check out date</h4> 
                         <p><?php echo $row['CheckoutDate']; ?></p>
                    </div> 
                </div>
                <hr>
                <h3>Guest Information: </h3>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h3>Guest Name</h3> 
                         <p><?php echo $row['GuestName']; ?></p>
                    </div>  
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h3>Guest Phone</h3> 
                         <p><?php echo $row['Phone']; ?></p>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h3>Guest Email</h3> 
                         <p><?php echo $row['Email']; ?></p>
                    </div>  
                    <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <h3>Guest Address</h3> 
                         <p><?php echo $row['Address']; ?></p>
                    </div> 
                </div>
                 <hr>
                 


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>





<?php 
    }
}else{
?>
                                            <tr class="odd gradeX">
                                                <td class="center" colspan="5">No guest bookings</td>
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
                         
                    </div>



                     <!-- chart start -->
                     
                     <!-- Chart end -->
                      
                     <!-- start admited patient list -->
                     
                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
             
            <!-- end chat sidebar -->
        </div>

        <!-- end page container -->
        <!-- start footer -->
 <?php /* INCLUDE "page-builder/footer.php"; */
    } 
    ?>
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
	<script src="assets/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <!-- counterup -->
    <script src="assets/counterup/jquery.waypoints.min.js" ></script>
    <script src="assets/counterup/jquery.counterup.min.js" ></script>
    <!-- Common js-->
	<script src="assets/app.js" ></script>
    <script src="assets/layout.js" ></script>
    <script src="assets/theme-color.js" ></script>
    <!-- material -->
    <script src="assets/material/material.min.js"></script>
    <!-- chart js -->
    <script src="assets/chart-js/Chart.bundle.js" ></script>
    <script src="assets/chart-js/utils.js" ></script>
    <script src="assets/chart-js/home-data.js" ></script>
    <script type="text/javascript">
    window._mfq = window._mfq || [];
    (function() {
        var mf = document.createElement("script");
        mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/0ce82da7-d997-4491-a65f-f82d74efdecb.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
    })();
</script>
    <!-- end js include path -->
  </body>
</html>