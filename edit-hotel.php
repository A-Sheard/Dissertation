<?php session_start(); ob_start(); INCLUDE "php/db-connect.php";?>
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
    <link href="css/dropzone.css" rel="stylesheet" type="text/css" />
    <!--fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" /> 



    <!-- sweet alert -->
    <link rel="stylesheet" href="assets/sweet-alert/sweetalert.min.css">
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <?php INCLUDE "page-builder/header.php"; 

$FindHotel = $connecDB->query("SELECT * FROM Hotels WHERE ID = '".$_SESSION['HotelID']."' LIMIT 1");
if(mysqli_num_rows($FindHotel) > 0){
    while($row = $FindHotel->fetch_array()){
        $Address = $row['Address'];
        $Phone = $row['Phone'];
        $Email = $row['Email'];
        $Website = $row['Website'];
    }
}
        ?>
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
                                <div class="page-title">Edit Hotel Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li> 
                                <li class="active">Edit Hotel Details</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Hotel Information</header> 
                                </div>
                                <div class="card-body" id="bar-parent">
                                    <form action="" id="edit-hotel" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="row">

                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label">Hotel Name</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="name" id="name" data-required="1" required="required" value="<?php echo $_SESSION['HotelName']; ?>" class="form-control input-height" disabled=""/> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label">Website URL</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="website" id="website" data-required="1" required="required" placeholder="www.example.com" value="<?php echo $Website; ?>" class="form-control input-height" /> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label">Phone Number
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="phone" id="phone" data-required="1" required="required" placeholder="0800 123 456" class="form-control input-height" value="<?php echo $Phone; ?>" /> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label">Email Address
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                           <input type="text" name="email" id="email" data-required="1" required="required" placeholder="123 Street, County, Post Code" class="form-control input-height" value="<?php echo $Email; ?>"/> 
                                                        </div>
                                                    </div>
                                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label class="control-label">Address
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-12">
                                                           <input type="text" name="address" id="address" data-required="1" required="required" placeholder="123 Street, County, Post Code" class="form-control input-height" value="<?php echo $Address; ?>"/> 
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
                                             <div class="col-md-6 col-sm-12">  
                                                    <div class="form-body">
                                                        
                                                            <div class="dropzone>"></div>
                                                            <form action="/php/upload.php?type=logo" METHOD="POST" enctype="multipart/form-data" class="dropzone"> 
                                                            </form> 
                                                    </div>
                                                <form action="/php/upload.php?type=logo" METHOD="POST" enctype="multipart/form-data" class="dropzone"> 
                                                </form>
                <?php 
                $FindImg = $connecDB->query("SELECT * FROM Images WHERE HotelID = '".$_SESSION['HotelID']."'AND TableName = 'Logo' AND TableRow = '$ID' AND Active = 'y'");
                if(mysqli_num_rows($FindImg) > 0){
                    while($rowb = $FindImg->fetch_array()){ ?>
                                                            <div class="col-md-4 uploaded-image" style="background-image: url('\\uploads\\<?php echo $rowb['FileName']; ?>'); ">
                                                                <div class="hover-me">
                                                                    <div class="delete-photo" id="del-<?php echo $rowb['ID']; ?>">X</div>
                                                                </div>
                                                            </div>
                <?php 
                    }  
                }
                ?>  
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

    <!-- Sweet Alert -->
    <script src="assets/sweet-alert/sweetalert.min.js" ></script>
    <script src="assets/sweet-alert/sweet-alert-data.js" ></script>

    <script src="/js/dropzone.js"></script>


    <!-- Material -->
    <script src="assets/material/material.min.js"></script>
    <!-- custom js -->
    <script src="js/form-validation.js"></script>
     <!-- end js include path -->
     <script type="text/javascript">
        $('.delete-photo').click(function(){

            var imageId = $(this).attr('id');
                imageId = imageId.substring(4);

            $.post('php/delete-image.php',{'deleteMe':imageId}, function(result) { 
                //$('#echo-result').html(result);  
                if(result == 'success'){
                    //$('#echo-result').html(result);
                    swal({title: "Success", text: "The image has been removed", type: "success"},
                    function(){ 
                           location.reload();
                       }
                    ); 
                }else{
                    swal("Error", result, "error");
                    //$('#echo-result').html(result);  
                }
            });
        });


        var frm = $('#edit-hotel');
        frm.submit(function (e) {
            e.preventDefault();
 
            //var name = $('#name').val();
            var website = $('#website').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var address = $('#address').val(); 

            var postVar = 0;


            $('.form-control').each(function(i, obj) {

                if( !ValidateInput($(this).attr('id')) ){
                    postVar++
                }

            })

            if (postVar < 1) {
                $.post('hotel-editor/edit-hotel.php',{'website':website,'phone':phone,'email':email,'address':address}, function(result) { 
                    //$('#echo-result').html(result);  
                    if(result == 'Success'){
                        //$('#echo-result').html(result);
                        swal("Success", "Your details have been updated", "success");
                    }else{
                        swal("Error", "Please check the email field and try again", "error");
                        //$('#echo-result').html(result);  
                    }
                });   
            }else{
                swal("Oops!", "Please check the website field and try again", "error");
                //alert("ERROR");
            } 
        });

        $('.form-control').keyup(function(){
            //check user input dynamically against regex
           
            ValidateInput($(this).attr('id'));
        });


     </script>
</body>
</html>