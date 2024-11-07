<?php include'dbfiles/login_process1.php' ?>
<?php include'dbfiles/org.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />

		<title>SMTS GROUP</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- <link rel="shortcut icon" href="assets/css/favicon-32x32.png">-->
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		
<style>


body {
        background: linear-gradient(to bottom, #87CEEB 0%, #ADD8E6 50%, #1E90FF 100%);
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
    }
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
           /* Light Blue to Magenta to Purple Gradient + Local Image Background */
            background-repeat: no-repeat;
            background-size: cover; /* Ensure the image covers the entire background */
            background-position: top;
            animation: fadeInBackground ease 0.8s;
        }
    @keyframes fadeInBackground {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

.center img {
            width: 20%;
            height: auto;
            border-radius: 8px;
            animation: fadeInOut 5s infinite;
        }

        @keyframes fadeInOut {
            0%, 100% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
        }

        .center {
            height: 400px;
        }

.center {
    height: 400px;
}

.login-layout {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70vh;
        background: linear-gradient(to bottom, #87CEEB, #ADD8E6, #1E90FF), url('smst.png') no-repeat center center fixed;
        background-size: cover;
        animation: fadeInBackground ease 0.5s;
    }

.login-box {
    background-color: #fff;
    border: 1px solid #d2d6de;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 400px;
    width: 100%;
    margin: auto;
    animation: fadeInAnimation ease 1s;
    animation-fill-mode: both;
}

.login-box h4 {
    text-align: center;
    margin-bottom: 20px;
}

.login-box form {
    margin-top: 20px;
}

.login-box label {
    display: block;
    margin-bottom: 10px;
}

.login-box input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
}

.login-box button {
    width: 100%;
}

.login-box a {
    display: block;
    text-align: center;
    margin-top: 10px;
    color: #337ab7;
    text-decoration: none;
}

@keyframes fadeInAnimation {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: none;
    }
}
/* Clock Styles */
#clock {
            font-size: 24px; /* Adjust the font size as needed */
            color: black;
            position: fixed;
            bottom: 50px; /* Adjust the vertical position */
            right:80px; /* Adjust the horizontal position */
        }

	</style>
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="./stars.css">
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout" >
		
		<div class="main-container">
			<div class="main-content">
				<div class="row">
				    
				    
				    
				   <!-- <div  class="col-sm-12" align="center" >
                 <img src="smts.png" width="100%"/>
            </div>-->
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center" style="height:400px;">
								
                            <img src="smts.png" alt="Your Image Alt Text" style="width: 100%; height: auto;">
							</div>

							

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												
												Please Enter Login Information
											</h4>
										    
                                            
              <?php echo $error; ?>
            								<form method="post" action=""  novalidate="novalidate" autocomplete="off" >
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="uname" id="uname" class="form-control" placeholder="Username" value="<?php echo @$user_email ?>" required/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
<strong class="alert-danger"><?php echo $errorName; ?></strong>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="pwd" id="pwd" required class="form-control" placeholder="Password" value="<?php echo @$password1 ?>" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
<strong class="alert-danger"><?php echo $errorpss; ?></strong>
													<div class="space"></div>

													<div class="clearfix">
														
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary" name="submit" ><i class="ace-icon fa fa-key"></i>Login</button>
															
															
														
													</div>

													<a href="">FORGET PASSWORD</a>
												</fieldset>
											</form>

											<!--<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>-->

											

											<!--<div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div>-->
										</div><!-- /.widget-main -->

										
										
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<!-- /.forgot-box -->

								<!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="clock" id="clock"></div>
                    </div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
 <script>
        // Clock script
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Ensure two digits for hours, minutes, and seconds
            hours = (hours < 10) ? '0' + hours : hours;
            minutes = (minutes < 10) ? '0' + minutes : minutes;
            seconds = (seconds < 10) ? '0' + seconds : seconds;

            var timeString = hours + ':' + minutes + ':' + seconds;

            document.getElementById('clock').textContent = timeString;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);
    </script>
		<!-- inline scripts related to this page -->
		
	</body>
</html>

