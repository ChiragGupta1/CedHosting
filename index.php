<?php
	if(isset($_SESSION['email'])) {
		if($_SESSION['isadmin'] == 1) {
			echo "<script>
				alert('Please login as User to access!');
			</script>";
		} else {

		}
	} else {

	}
?>
<!--
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
<script src="js/modernizr.custom.97074.js"></script>
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<!--lightboxfiles-->
<script type="text/javascript">
	$(function() {
	$('.team a').Chocolat();
	});
</script>	
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
						<script type="text/javascript">
							$(function() {
							
								$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

							});
						</script>						
<!--script-->
</head>
<body>
<!---header--->
	<?php include "header.php";?>
	<!---banner--->
		<div class="banner">
			<div class="container">
				<div class="banner-grids">
					<div class="col-md-6 banner-grid">
						<img src="images/srceen.png" class="img-responsive" alt=""/>
					</div>
					<div class="col-md-6 banner-grid">
						<h3>Unlimited Web Hosting</h3>
						<p>this hero area to show off some of your nice work. You can even have a video inside it since it’s great as a secondary call to action alongside this button underneath this text.</p>
						<a href="single.html" class="button">get started</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!---banner--->
	<!---brilliantly --->
			<div class="content">
				<div class="brilliant-section">
					<div class="container">
						<h2>this is what we do.</h2>
						<h5>We get the job done, no matter the project</h5>
						<div class="brilliant-grids">
							<div class="col-md-4 brilliant-grid">
								<div class="brilliant-left">
								<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
								</div>
								<div class="brilliant-right">
									<h4>Expert Web Design</h4>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-md-4 brilliant-grid">
								<div class="brilliant-left">
								<i class="glyphicon glyphicon-cloud" aria-hidden="true"></i>
								</div>
								<div class="brilliant-right">
									<h4>ftp services</h4>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-md-4 brilliant-grid">
								<div class="brilliant-left">
								<i class="glyphicon glyphicon-signal" aria-hidden="true"></i>
								</div>
								<div class="brilliant-right">
									<h4>Support Service</h4>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="brilliant-grids">
							<div class="col-md-4 brilliant-grid">
								<div class="brilliant-left">
								<i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
								</div>
								<div class="brilliant-right">
									<h4>multi domain</h4>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-md-4 brilliant-grid">
								<div class="brilliant-left">
								<i class="glyphicon glyphicon-link" aria-hidden="true"></i>
								</div>
								<div class="brilliant-right">
									<h4>Link Building</h4>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-md-4 brilliant-grid">
								<div class="brilliant-left">
								<i class="glyphicon glyphicon-phone" aria-hidden="true"></i>
								</div>
								<div class="brilliant-right">
									<h4>Mobile Optimization</h4>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart.</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!---brilliantly--->
				<!---prices--->
					<div class="price-section">
						<div class="container">
							<h3>transparent prices</h3>
							<h5>Premium quality, low prices guaranteed!</h5>
							<div class="price-grids">
								<div class="col-md-3 price-grid">
									<div class="pricing">
										<div class="price-top">
											<h4>Bronze</h4>
										</div>
										<div class="price-bottom">
											<h6>$199/<span>month</span></h6>
											<ul>
												<li>2 Concepts</li>
												<li> 12 Total Revisions</li>
												<li>1 Year Free Hosting</li>
												<li> 1 Gb Disk Space</li>
												<li> 10 Email Address</li>
												<li> 2 Conference Calls</li>
												<li> E-mail Support</li>
											</ul>
											<a href="#" class="button1">get started</a>
										</div>
									</div>
								</div>
								<div class="col-md-3 price-grid">
									<div class="pricing">
										<div class="price-top">
											<h4>Silver</h4>
										</div>
										<div class="price-bottom">
											<h6>$499/<span>month</span></h6>
											<ul>
												<li>2 Concepts</li>
												<li> 16 Total Revisions</li>
												<li>1 Year Free Hosting</li>
												<li> 2 Gb Disk Space</li>
												<li> 20 Email Address</li>
												<li> 5 Conference Calls</li>
												<li> E-mail Support</li>
											</ul>
											<a href="#" class="button1">get started</a>
										</div>
									</div>
								</div>
								<div class="col-md-3 price-grid">
										<div class="seller">
										</div>
									<div class="pricing">
										<div class="price-top">
											<h4>Gold</h4>
										</div>
										<div class="price-bottom">
											<h6>$799/<span>month</span></h6>
											<ul>
												<li>2 Concepts</li>
												<li> 18 Total Revisions</li>
												<li>1 Year Free Hosting</li>
												<li> 4 Gb Disk Space</li>
												<li> 30 Email Address</li>
												<li> 7 Conference Calls</li>
												<li> E-mail Support</li>
											</ul>
											<a href="#" class="button1">get started</a>
										</div>
									</div>
								</div>
								<div class="col-md-3 price-grid">
									<div class="pricing">
										<div class="price-top">
											<h4>Platinum</h4>
										</div>
										<div class="price-bottom">
											<h6>$777/<span>month</span></h6>
											<ul>
												<li>Unlimited Concepts</li>
												<li> Unlimited Revisions</li>
												<li>1 Year Free Hosting</li>
												<li> Unlimited Gb Disk Space</li>
												<li> 100 Email Address</li>
												<li> 20 Conference Calls</li>
												<li> Live Support</li>
											</ul>
											<a href="#" class="button1">get started</a>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				<!---prices--->
				<!---posts--->
					<div class="post-section">
						<div class="container">
							<h3>Check our recent posts</h3>
							<h5>We like to keep everyone updated</h5>
							<div class="post-grids">
								<div class="col-md-4 post-grid">
									<a href="single.html" class="mask"><img src="images/p1.jpg" class="img-responsive zoom-img" alt="/"></a>
									<a href="single.html"><h4>Vestibulum ipsums eros</h4></a>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart from the competition.</p>
								</div>
								<div class="col-md-4 post-grid">
									<a href="single.html" class="mask"><img src="images/p2.jpg" class="img-responsive zoom-img" alt="/"></a>
									<a href="single.html"><h4>Vestibulum ipsums eros</h4></a>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart from the competition.</p>
								</div>
								<div class="col-md-4 post-grid">
									<a href="single.html" class="mask"><img src="images/p3.jpg" class="img-responsive zoom-img" alt="/"></a>
									<a href="single.html"><h4>Vestibulum ipsums eros</h4></a>
									<p>We strive to deliver the very best possible work that’s available out there, at any time. That’s how we set ourselves apart from the competition.</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				<!---posts--->
			</div>	
			<!---footer--->
			<?php include "footer.php";?>
			<!---footer--->
			
			
</body>
</html>