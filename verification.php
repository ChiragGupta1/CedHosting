<?php
    session_start();
    include "class/User.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once "vendor/autoload.php";
    
    $email = isset($_GET['email'])?$_GET['email']:'';
    $mobile = isset($_GET['mobile'])?$_GET['mobile']:'';
    $verify_email = isset($_POST['verify-email'])?$_POST['verify-email']:'';
    if (isset($_POST['email-btn'])) {
      
        
        echo "<script>
            alert('Please Check your email for the verification process!');
        </script>";
        $mail = new PHPMailer(true);
        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "chirag.gupta.qa@gmail.com";                 
        $mail->Password = "Chirag@123";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "ssl";                           
        //Set TCP port to connect to
        $mail->Port = 465;                                   
        
        $mail->From = "chirag.gupta.qa@gmail.com";
        $mail->FromName = "Ced Hosting";
        
        $mail->addaddress($verify_email, "");
        
        $mail->isHTML(true);
        
        $mail->Subject = "Email Verification for CedHosting Account";
        $mail->Body = "Please <i><a href='http://localhost/CedHosting/thankyou.php?flag=1&email=".$email."'>Click here</a></i> to activate your account.";
        $mail->AltBody = "";
        $mail->SMTPDebug = 0;
        try {
            $mail->send();
            
            //echo "Message has been sent successfully";
        } catch (Exception $e) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
    // Resend email
    if (isset($_GET['resend'])) {

      echo "<script>
          alert('Please Check your email for the verification process!');
      </script>";
      $mail = new PHPMailer(true);
      //Enable SMTP debugging.
      $mail->SMTPDebug = 3;                               
      //Set PHPMailer to use SMTP.
      $mail->isSMTP();            
      //Set SMTP host name                          
      $mail->Host = "smtp.gmail.com";
      //Set this to true if SMTP host requires authentication to send email
      $mail->SMTPAuth = true;                          
      //Provide username and password     
      $mail->Username = "chirag.gupta.qa@gmail.com";                 
      $mail->Password = "Chirag@123";                           
      //If SMTP requires TLS encryption then set it
      $mail->SMTPSecure = "ssl";                           
      //Set TCP port to connect to
      $mail->Port = 465;                                   
      
      $mail->From = "chirag.gupta.qa@gmail.com";
      $mail->FromName = "Ced Hosting";
      
      $mail->addaddress($email, "");
      
      $mail->isHTML(true);
      
      $mail->Subject = "Email Verification for CedHosting Account";
      $mail->Body = "Please <i><a href='http://localhost/CedHosting/thankyou.php?flag=1&email=".$email."'>Click here</a></i> to activate your account.";
      $mail->AltBody = "";
      $mail->SMTPDebug = 0;
      try {
          $mail->send();
          
          //echo "Message has been sent successfully";
      } catch (Exception $e) {
          //echo "Mailer Error: " . $mail->ErrorInfo;
      }
  }

    if(isset($_POST['mobile-btn'])){
      $mobile = isset($_POST['verify-mobile'])?$_POST['verify-mobile']:'';
      $otp = rand(1000,9999);
      $_SESSION['otp']=$otp;
      $fields = array(
        "sender_id" => "FSTSMS",
        "message" => "This is your One Time Password(OTP) by CHIRAG for the verification on the CedHosting site : ".$otp,
        "language" => "english",
        "route" => "p",
        "numbers" => "$mobile",
    );

      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($fields),
      CURLOPT_HTTPHEADER => array(
          "authorization: WamevNEnlyMX3kzsRi0FHfUV9oKpSwGAhxTbrYI5guJPt18jOctubiq3nHjA8U7gWIy12v9wQGlX6hKk",
          "accept: */*",
          "cache-control: no-cache",
          "content-type: application/json"
      ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
      //echo "cURL Error #:" . $err;
      } else {
      //echo $response;
      header("location: verify_mobile.php?email=".$email."");
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
		require_once "class/Dbcon.php";
    $db = new Dbcon();
    if(isset($_POST['email-hidden'])) {
      echo "<script>
        $(document).ready(function (){
          $('#email-btn').prop('disabled', true);
          $('#resend-mail').prop('hidden', false);
        })
        
      </script>";
    }
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
										<span>Email Address<label>*</label></span>
										<input id="email-field" type="text" name="verify-email" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" readonly required> 
                    <input id="email-hidden" type="hidden" name="email-hidden" value="sent">     
                    
                  </div>
                      <input id="email-btn" type="submit" value="Verify Email" name="email-btn">
                      <a id="resend-mail" href="verification.php?resend=set&resend-email=" hidden>Resend Mail?</a>
                    </form>
                    <form action="" method="POST">
									  <div>
										<span>Mobile<label>*</label></span>
										<input id="mobile-field" type="text" name="verify-mobile" pattern="(([0]{1}[1-9]{1}[0-9]{9})|([1-9]{1}[0-9]{9}))" readonly required>
									  </div>
									  <input type="submit" value="Verify Mobile" name="mobile-btn">
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