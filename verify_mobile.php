<?php
session_start();
	require_once "class/Dbcon.php";
	include "class/User.php";
	$user = new User();
	$db = new Dbcon();

    if(isset($_POST['verify-btn'])) {
		$otp = isset($_POST['otp-field'])?$_POST['otp-field']:'';
		$email = isset($_GET['email'])?$_GET['email']:'';
		
		if($otp == $_SESSION['otp']){
			$update = $user->update_user($db->connect(), 'phone_approved', $email);
			if($update) {
				session_destroy();
				echo "<script>
						alert('Mobile number has been successfully Verified. Redirecting to Login Page!');
						window.location.replace('login.php');
				</script>";
			} else {
				echo "<script>
						alert('Sorry! we are unable to verify your number.');
						window.location.replace('verify_mobile.php?verified=0');
				</script>";
			}
		}
	}

?>
<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>CedHosting</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
                        $('#email-field').val("<?php echo $email;?>");
                        $('#mobile-field').val("<?php echo $mobile;?>");
					});
				</script>
<!--script-->
</head>
<body>
	<!---header--->
	<?php
	if(isset($_SESSION)) {

	} else {
		session_start();
	}
		require_once "class/Product.php";
		$product = new Product();
	?>
	<!---header--->
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<a href="index.php"><img style="width: 50%; margin-top: 0px; padding: 0px;" src="images/logo.png" alt=""></a>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="services.php">Services</a></li>
								<?php
									// $show_category = $product->show_category($db->connect(), '=');
									// foreach ($show_category as $key => $value) {
									// 	echo "<li><a href='".$value['link']."'>".$value['prod_name']."</a></li>";
									// }
								?>
								<li class="dropdown">
									<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
									<?php 
										$show_category = $product->show_category($db->connect(), '!=');
										foreach ($show_category as $key => $value) {
											echo "<li><a href='".$value['link']."'>".$value['prod_name']."</a></li>";
										}
									?>
									</ul>
								</li>		
								<li><a href="pricing.php">Pricing</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="cart.php"><img src="images/shopping-cart.png" alt="" class="w-25"></a></li>
								<li><a href='login.php'>Login</a></li>
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-right">
									<h3>verification</h3>
									<p>Please verify your email and mobile to continue.</p>
									<form action="" method="POST">
									  <div>
										<span>Verify<label>*</label></span>
										<input id="otp-field" type="number" name="otp-field" required> 
									  </div>
									  <input type="submit" value="Verify OTP" name="verify-btn">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
				
			<!---footer--->
            <?php include "footer.php";?>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/verify.js"></script>
</body>
</html>