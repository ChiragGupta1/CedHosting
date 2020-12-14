<?php session_start();
 if(isset($_SESSION['email'])){
	 unset($_SESSION['email']);
 }
	require_once "class/Dbcon.php";
	$db = new Dbcon();
	include "class/User.php";
	$user = new User();

	if(isset($_SESSION['email'])) {
		$admin_check = $_SESSION['isadmin']; 
		if($admin_check == 1){
			header("location: admin/index.php");
		} else {
			
		}
	} else {
		if (isset($_POST['login'])) {
			$email = isset($_POST['login-email'])?$_POST['login-email']:'';
			$password = isset($_POST['login-password'])?$_POST['login-password']:'';
	
			$login = $user->login($db->connect(), $email, $password);
			if($login == 1) {
				$admin_check = $user->isadmin($db->connect(), $email); 
				if($admin_check['is_admin'] == 0) {
					header("location: index.php");
				} else {
					header("location: admin/index.php");
				}
				
			} else if($login == -1) {
				//$enc_email = md5($email);
				
				$fetch = $user->fetch_users($db->connect(), $email, $password, 0);
				//$enc_mobile = md5($fetch['mobile']);
				echo "<script>
					alert('Please verify your email or mobile first!');
					window.location.replace('verification.php?email=".$email."&mobile=".$fetch['mobile']."');
				</script>";
				
			} else {
				echo "<script>
					alert('Invalid credentials!');
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
<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
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
					});
				</script>
<!--script-->
</head>
<body>
	<!---header--->
	<?php include "header.php";?>
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="" method="POST">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="login-email" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" required> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="login-password"> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" value="Login" name="login">
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
</body>
</html>