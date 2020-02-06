<?php session_start(); ob_start();?>
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
                                <div class="page-title">Create Room Type</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li> 
                                <li class="active">Create Room Type</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Room Information</header> 
                                </div>
                                <div class="card-body" id="bar-parent">
                                    <form action="" id="add-building" class="form-horizontal">
                                        <div class="form-body">
                                            
                                            <div class="row">

                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <label class="control-label">Room Type
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="name" id="name" data-required="1" required="required" placeholder="Enter Room Name" class="form-control input-height" /> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                                        <label class="control-label">Single Beds</label>
                                                        <div class="col-md-12 input-group spinner">
                                                            <input type="text" name="single" id="single" class="form-control" value="0" min="0" max="20">
                                                            <div class="input-group-btn-vertical">
                                                                <button class="btn btn-default" type="button" data-dir="up">
                                                                    <i class="fa fa-caret-up"></i>
                                                                </button>
                                                                <button class="btn btn-default" type="button" data-dir="dwn">
                                                                    <i class="fa fa-caret-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                        <label class="control-label">Double Beds</label>
                                                        <div class="col-md-12 input-group spinner">
                                                            <input type="text" name="double" id="double" class="form-control" value="0" min="0" max="20">
                                                            <div class=" input-group-btn-vertical">
                                                                <button class="btn btn-default" type="button" data-dir="up">
                                                                    <i class="fa fa-caret-up"></i>
                                                                </button>
                                                                <button class="btn btn-default" type="button" data-dir="dwn">
                                                                    <i class="fa fa-caret-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                        <label class="control-label">Sleeps
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12 input-group spinner">
                                                            <input type="text" name="sleeps" id="sleeps" required="required" class="form-control" value="0" min="0" max="20">
                                                            <div class="input-group-btn-vertical">
                                                                <button class="btn btn-default" type="button" data-dir="up">
                                                                    <i class="fa fa-caret-up"></i>
                                                                </button>
                                                                <button class="btn btn-default" type="button" data-dir="dwn">
                                                                    <i class="fa fa-caret-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-7 col-sm-6 col-xs-12">
                                                    <label class="control-label">Description
                                                    </label>
                                                    <div class="col-md-12">
                                                       <textarea name="description" id="description" placeholder="Room Description" class="form-control-textarea" rows="5"></textarea>
                                                    </div>
                                                </div> 
                                            </div> 
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-12 center">
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
         
    var frm = $('#add-building');
        frm.submit(function (e) {
            e.preventDefault();
 
            var name = $('#name').val();
            var single = $('#single').val();
            var double = $('#double').val();
            var sleeps = $('#sleeps').val();
            var description = $('#description').val(); 

            if(name.length > 0 && name != ' '){
                $('#name').css('border','1px solid #d2d6de');
                if(single >= 0 && single <= 20 && single % 1 === 0){
                    $('#single').css('border','1px solid #d2d6de');
                    if(double >= 0 && double <= 20 && double % 1 === 0){
                        $('#double').css('border','1px solid #d2d6de');
                        if(sleeps >= single + (double*2) && sleeps % 1 === 0){
                            $('#sleeps').css('border','1px solid #d2d6de');

                            $.post('hotel-editor/add-room-type.php',{'name':name,'description':description,'single':single,'double':double,'sleeps':sleeps}, function(result) { 
                                //$('#echo-result').html(result);  
                                if(result == 'Success'){
                                    $('#echo-result').html(result);
                                }else{
                                    $('#echo-result').html(result);  
                                }
                            });

                        }else{
                            $('#sleeps').css('border','1px solid #fe0000');
                        }
                    }else{
                        $('#double').css('border','1px solid #fe0000');
                    }
                }else{
                    $('#single').css('border','1px solid #fe0000');
                }
            }else{
                $('#name').css('border','1px solid #fe0000');
            }
 /*
            $.post('hotel-editor/add-building.php',{'name':name,'description':description}, function(result) { 
                //$('#echo-result').html(result);  
                if(result == 'Success'){
                    $('#echo-result').html(result);
                }else{
                    $('#echo-result').html(result);  
                }
            });*/
                
      });

     </script>
</body>
</html>