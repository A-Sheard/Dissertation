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

    <link rel="stylesheet" href="assets//material-datetimepicker/bootstrap-material-datetimepicker.css" />
    <!--fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" /> 
    <style type="text/css">
        .getmdl-select{
            width: 100% !important; 
        }
    </style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <?php INCLUDE "page-builder/header.php"; ?>
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
                                <div class="page-title">Book a Room</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li> 
                                <li class="active">Add Booking</li>
                            </ol>
                        </div>
                    </div>
                    <form action="" id="add-booking" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Guest Information</header> 
                                </div>
                                <div class="card-body" id="bar-parent"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Guest Name
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="name" id="name" data-required="1" required="required" placeholder="John Doe" class="form-control input-height" /> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Guest Phone
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="phone" id="phone" data-required="1" required="required" placeholder="John Doe" class="form-control input-height" /> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Guest Email
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="email" name="email" id="email" data-required="1" required="required" placeholder="example@hotel.com" class="form-control input-height" /> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Guest Address
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="address" id="address" data-required="1" required="required" placeholder="John Doe" class="form-control input-height" /> 
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-head">
                                        <header>Booking Information</header> 
                                    </div>

                                     <div class="card-body" id="bar-parent">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Check in Date
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="in-date" class="form-control input-height" placeholder="Start Date" value="<?php echo date('d/m/Y'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Check out Date
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="out-date" class="form-control input-height" placeholder="Start Date" value="<?php echo date('d/m/Y'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Number of Guests
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12 input-group spinner">
                                                            <input type="text" name="guests" id="guests" class="form-control" value="0" min="0" max="20">
                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                                 
                                                <div class="row">
                                                    
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Room Type</label>
                                                        <div class="col-md-12">  

                                                            <div class=" mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="width: 100%;">
                                                                
                                                                <input class="form-control" type="text" id="roomtype" value="Select Room" tabIndex="-1">
                                                                <label for="roomtype" class="pull-right margin-0">
                                                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                                                </label> 
                                                                <ul data-mdl-for="roomtype" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
<?php 
$FindRooms = $connecDB->query("SELECT * FROM RoomTypes WHERE HotelID = '".$_SESSION['HotelID']."'");
if(mysqli_num_rows($FindRooms) > 0){
    while($row = $FindRooms->fetch_array()){
        $RoomName = $row['Name'];
?>        
                                                                    <li class="mdl-menu__item" data-val="<?php echo str_replace(' ', '-', $RoomName); ?>"><?php echo $RoomName; ?></li>
<?php } }else{ ?>
                                                                    <li class="mdl-menu__item" data-val="na">Add a room type first!</li>
<?php } ?>                                                                    
                                                                </ul>     
                                                            </div> 
                                                        </div>
 
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <label class="control-label">Number of Rooms
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12 input-group spinner">
                                                            <input type="text" name="rooms" id="rooms" class="form-control" value="0" min="0" max="">
                                                             
                                                        </div>
                                                    </div>
                                            </div>
                                              
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12 center">
                                                        <button id="submit" class="btn btn-info m-r-20">Submit</button> 
                                                        
                                                    </div>
                                                </div>
                                             </div>
                                             <div id="echo-result"></div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div> 
            </div>
        </div>
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

    <script src="assets/getmdl-select.js" ></script>
    <!-- Material -->
    <script src="assets/material/material.min.js"></script>
    <script  src="assets/material-datetimepicker/moment-with-locales.min.js"></script>
    <script  src="assets/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
    <script  src="assets/material-datetimepicker/datetimepicker.js"></script>

     <!-- end js include path -->
     <script type="text/javascript">
         
    var frm = $('#add-booking');
        frm.submit(function (e) {
            e.preventDefault();
 
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var indate = $('#in-date').val();
            var outdate = $('#out-date').val();
            var guests = $('#guests').val();
            var roomtype = $('#roomtype').val();
            var rooms = $('#rooms').val();
 

            $.post('booking-handler/add-booking.php',{'Name':name,'Phone':phone,'Email':email,'Address':address,'Checkin':indate,'Checkout':outdate,'NumberOfGuests':guests,'RoomType':roomtype,'NumberOfRooms':rooms}, function(result) { 
                //$('#echo-result').html(result);  
                if(result == 'Success'){
                    $('#echo-result').html(result); 
                }else{
                    $('#echo-result').html(result);   
                }
            }); 
      });

     </script>
</body>
</html>