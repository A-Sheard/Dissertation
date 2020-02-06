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
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="assets/material/material.min.css">
    <link rel="stylesheet" href="css/material_style.css">
    <!-- Theme Styles -->
    <link href="css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/theme-color.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/sweet-alert/sweetalert.min.css">
    <!--fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
		<?php INCLUDE "page-builder/header.php"; unset($_SESSION['rownum']);?>
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
                        <div class="col-md-12">
                            <div class="tabbable-line"> 
                                    <a href="add-building.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary">Add new building</a>
                                <div class="tab-content"> 
                                    <div>
                                        <div class="row">
                                            <?php 
                                                $AllBuildings = $connecDB->query("SELECT ID,Name,Description FROM Buildings WHERE (ActiveUntil > now() OR ActiveUntil = '0000-00-00 00:00:00') AND HotelID = '".$_SESSION['HotelID']."'");
                                                if(mysqli_num_rows($AllBuildings) > 0){

                                                    while($row = $AllBuildings->fetch_array()){
                                                        $FindImg = $connecDB->query("SELECT FileName FROM Images WHERE HotelID = '".$_SESSION['HotelID']."' AND TableRow = '".$row['ID']."'");
                                                            if(mysqli_num_rows($FindImg) > 0){
                                                                while($rowb = $FindImg->fetch_array()){
                                                                    $Img = "/uploads/".$rowb['FileName'];
                                                                }  
                                                            }
                                            ?>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="card card-topline-aqua">
                                                    <div class="card-body no-padding ">
                                                        <div class="doctor-profile">
                                                            <div style="width: 112px; height: 112px; background-image: url('<?php echo $Img; ?>');background-size: cover; background-repeat: no-repeat; border-radius: 50%; margin: 0 auto; border:3px solid rgb(210, 214, 222)"></div>
                                                            <div class="profile-usertitle">
                                                                <div class="doctor-name"><?php echo $row['Name']; ?></div>
                                                                <div class="name-center"><span>0</span> Rooms</div>
                                                                <div class="name-center"><?php echo $row['Description']; ?></div>
                                                            </div>
                                                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['ID']; ?>">Add Room</a>
                                                        
                                                            <a href="view-rooms.php?building=<?php echo $row['ID']; ?>" class="btn btn-info btn-sm">View Rooms</a>
 



                    <div class="modal fade" id="exampleModalCenter<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLongTitle">Add a room to <?php echo $row['Name']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="control-label">Room Type</label>
                                            <div class="col-md-12">

                                                    <select class="form-control" id="roomType">
        <?php 
        $RoomTypes = $connecDB->query("SELECT * FROM RoomTypes WHERE HotelID = '".$_SESSION['HotelID']."' AND (ActiveUntil = 0 OR ActiveUntil > now())");
        if(mysqli_num_rows($RoomTypes) > 0){

        while($rowb = $RoomTypes->fetch_array()){
        ?>
                                                        <option value="<?php echo $rowb['ID']; ?>"><?php  echo $rowb['Name']; ?></option>
        <?php } }else{ ?>                                          
                                                        <option>Add a room type first!</option>
        <?php } ?>
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12"> 
                                        <label class="control-label">Room Number</label>
                                        <div class="col-md-12 input-group spinner" style="padding-top: 20px;">
                                            <input type="text" name="total" id="roomNo-<?php echo $row['ID']; ?>" class="form-control">
                                             
                                        </div> 
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary add-room" id="<?php echo $row['ID']; ?>">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                                            <a href="edit-building.php?building=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm">Edit Building</a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } }else{ ?>
                                             <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="card card-topline-aqua">
                                                    <div class="card-body no-padding ">
                                                        <div class="doctor-profile"> 
                                                            <div class="profile-usertitle">
                                                                <div class="doctor-name">You don't have any buildings yet!</div>
                                                                <div class="name-center">Add one to start taking bookings.</div>
                                                            </div>
                                                            <a href="add-building.php" class="btn btn-primary btn-sm">Add Building</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
                                          
                                    </div>
                                </div>
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
    <script src="assets/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <script src="assets/sweet-alert/sweetalert.min.js" ></script>
    <script src="assets/sweet-alert/sweet-alert-data.js" ></script>
    <!-- Common js-->
    <script src="assets/app.js" ></script>
    <script src="assets/layout.js" ></script>
    <script src="assets/theme-color.js" ></script>
    <!-- Material -->
    <script src="assets/material/material.min.js"></script>
     <!-- end js include path -->
   


     <script type="text/javascript">
         $('.add-room').click(function(){

            var buildingID = $(this).attr('id');
            var roomID = $('#roomType').val();
            var roomNo = $('#roomNo-'+ $(this).attr('id') ).val();
            $.post('hotel-editor/add-room.php',{'BuildingID':buildingID,'RoomID':roomID,'RoomNo':roomNo}, function(result) { 
                if(result == 'success'){
                    $('.exampleModalCenter').modal('hide');
                    showSuccessMessage();
                }else{
                    swal("Error", result, "error");
                    alert(roomNo);
                }

            });

            
         }) 

     </script>
</body>
</html>