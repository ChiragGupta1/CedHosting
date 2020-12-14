<?php
require_once "class/Dbcon.php";
$db = new Dbcon();
include "class/User.php";
	$user = new User();

	if (isset($_POST['signup'])) {
		$name = isset($_POST['name'])?$_POST['name']:'';
		$email = isset($_POST['email'])?$_POST['email']:'';
		$mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
		$ques = isset($_POST['sec-ques'])?$_POST['sec-ques']:'';
		$ans = isset($_POST['sec-ans'])?$_POST['sec-ans']:'';
		$password = isset($_POST['password'])?$_POST['password']:'';
		$con_password = isset($_POST['con-password'])?$_POST['con-password']:'';

		$check_email = $user->check_user_email_available($db->connect(), $email);
		$check_mobile = $user->check_user_mobile_available($db->connect(), $mobile);
		if($check_email > 0) {
            echo "<script>alert('Email ID already in use!');
                </script>";
		} else {
			if($check_mobile > 0) {
                echo "<script>alert('Mobile Number already in use!');</script>";
			} else {
				if ($password == $con_password) {
					$signup = $user->signup($db->connect(), $email, $name, $mobile, $password, $ques, $ans);
					if($signup){
                        echo "<script>alert('Signup Successful! Please verify your credentials.');</script>";
                        header("location: verification.php?email=".$email."&mobile=".$mobile."");
					} else {
                        echo "<script>alert('Something went wrong. Please try again later!');</script>";
					}
				} else {
                    echo "<script>alert('Password Dont Match!');</script>";
				}
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
					});
				</script>
<!--script-->
</head>
<body>
	<!---header--->
	<?php include "header.php";?>
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="" method="POST" id="signup-form"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="name" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" required> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email" id="login-email" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" required> 
					 </div>
					 <div>
						 <span>Mobile<label>*</label></span>
						 <input type="text" name="mobile" pattern="(([0]{1}[1-9]{1}[0-9]{9})|([6-9]{1}[0-9]{9}))" required> 
					 </div>
					 <div>
						 <span>Security Question<label>*</label></span>
						 <select name="sec-ques" id="sec-select">
							 <option value="c-name">What was your childhood nickname?</option>
							 <option value="c-friend">What is the name of your favourite childhood friend?</option>
							 <option value="c-place">What was your favourite place to visit as a child?</option>
							 <option value="c-job">What was your dream job as a child?</option>
							 <option value="t-name">What is your favourite teacher's nickname?</option>
						 </select>
						 <!-- <input type="text" name="sec-ques">  -->
					 </div>
					 <div>
						 <span>Security Answer<label>*</label></span>
						 <input type="text" name="sec-ans" pattern='^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$' required> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Validate Email</label> -->
					   </a>
					   <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Validate Mobile</label> -->
					   </a>
				 </div>
				<div class="register-bottom-grid">
					<h3>login information</h3>
						<div>
							<span>Password<label>*</label></span>
							<input type="password" pattern="^((?!.*[\s])(?=.*[A-Z])(?=.*\d).{8,16})" name="password" required>
							<small id="passwordHelpBlock" class="form-text text-muted">
  							Your password must be 8-16 characters long, contain the combination of Upper, Lower, Special and Numerics only. 
							</small>
						</div>
						<div>							
							<span>Confirm Password<label>*</label></span>
							<input type="password" pattern=".{8,}" name="con-password" required>
						</div>
				</div>
				<div class="clearfix"> </div>
				<div class="register-but">
					   <input type="submit" value="SIGNUP" name="signup">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
<!---footer--->
<?php include "footer.php";?>
<!---footer--->
</body>
</html>