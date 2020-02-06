<?php session_start(); ?>
<!DOCTYPE html>
<html>
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
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="assets/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="css/extra_pages.css">
	<!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" /> 
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form id="register">
					<span class="login100-form-logo">
						<h1>Booking System</h1>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" id="email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="forgot_password.php">
							Forgot Password?
						</a>
					</div>
				</form>
				<div id="echo-result">
				</div>
			</div>
		</div>
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
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/login.js"></script>
    <!-- end js include path -->
    <script type="text/javascript">

    	var frm = $('#register');
	    frm.submit(function (e) {
	    	e.preventDefault();
 
	    	var email = $('#email').val();
	    	var pass = $('#pass').val(); 

            $.post('login-system/login.php',{'email':email,'pass':pass}, function(result) { 
                //$('#echo-result').html(result);  
                if(result == 'Success'){
                	window.location.replace('/index.php');
                }else{
                	$('#echo-result').html(result);  
                }
            });

	  });

 
	</script>
	<script type="text/javascript">
    window._mfq = window._mfq || [];
    (function() {
        var mf = document.createElement("script");
        mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/0ce82da7-d997-4491-a65f-f82d74efdecb.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
    })();
</script>
</body>
</html>