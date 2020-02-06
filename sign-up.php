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
    <link rel="stylesheet" href="css/extra_pages.css"> 
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="css/formlayout.css" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="">
    <div class="limiter">
        <!-- start header -->
        <!-- end header -->
        <!-- start color quick setting -->
         
		<!-- end color quick setting -->
        <!-- start page container -->
        <div class="container-login100 page-background">
 			<!-- start sidebar menu -->
 			 
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="sign-up">
                <div class="page-content">
                     
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <h1>Basic Information</h1>
                                    <!--
                                        <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>-->
                                </div>
                                <div class="card-body" id="bar-parent">
                                    <form action="" id="sign-up" class="form-horizontal">
                                        <div class="form-body">
                                            
                                            <div class="row">

                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Your Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="name" id="name" data-required="1" required="required" placeholder="Enter your Name" class="form-control input-height" /> 
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Email
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-12">
                                                         
                                                        <input type="email" name="email" id="email" data-required="1" placeholder="Enter Your Email" class="form-control input-height" /> 
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input type="password" name="password" id="password" data-required="1" required="required" placeholder="Password" class="form-control input-height" /> 
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Confirm Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input type="password" name="passwordconf" id="passwordconf" data-required="1" required="required" placeholder="Confirm" class="form-control input-height" /> 
                                                    </div>
                                                </div>

                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Hotel Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="hotelname" id="hotelname" data-required="1" required="required" placeholder="Enter Hotel Name" class="form-control input-height" /> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Hotel Phone</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="hotelphone" id="hotelphone" placeholder="Enter Hotel Phone No." class="form-control input-height" /> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Hotel Email</label>
                                                    <div class="col-md-12">
                                                        <input type="email" name="hotelemail" id="hotelemail" placeholder="Enter Hotel Email" class="form-control input-height" /> 
                                                    </div>
                                                </div>
                                            </div>

											<div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12 center">
                                                        <button id="submit" class="btn btn-info m-r-20">Submit</button> 
                                                        <div id="echo-result"></div>
                                                    </div>
                                            	</div>
                                       		 </div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
             
            <!-- end chat sidebar -->
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
     <script type="text/javascript">
         
    var frm = $('#sign-up');
        frm.submit(function (e) {
            e.preventDefault();
 
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var passwordconf = $('#passwordconf').val();
            var hotelname = $('#hotelname').val(); 
            var hotelemail = $('#hotelemail').val(); 
            var hotelphone = $('#hotelphone').val(); 

            if(password == passwordconf){
                
                if(hotelphone.match(/^[0-9., ]+$/) || hotelphone === ""){
 
                    $.post('login-system/register.php',{'name':name,'email':email,'password':password,'passwordconf':passwordconf,'hotelname':hotelname,'hotelemail':hotelemail,'hotelphone':hotelphone}, function(result) { 
                        //$('#echo-result').html(result);  
                        if(result == 'Success'){
                            $('#echo-result').html(result);
                        }else{
                            $('#echo-result').html(result);  
                        }
                    });
                }else{
                    $('#hotelphone').css('border','1px solid #fe0000');
                }
            }else{
                $('#passwordconf').css('border','1px solid #fe0000');
                $('#password').css('border','1px solid #fe0000'); 
            }

/*
            $.post('login-system/login.php',{'email':email,'pass':pass}, function(result) { 
                //$('#echo-result').html(result);  
                if(result == 'Success'){
                    window.location.replace('/index.php');
                }else{
                    $('#echo-result').html(result);  
                }
            });*/

      });

     </script>
</body>
</html>