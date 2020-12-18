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
<!-- header -->
<?php include "header.php";?>

<!-- Page content -->
<?php
	$id = isset($_GET['id'])?$_GET['id']:'';
	$html = $product->check_parent($db->connect(), $id);
	echo $html['html'];
?>
<div class="tab-prices" id="products-div">
	<div class="container">
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
				<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
				<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
				</ul>
			<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
					<div class="linux-prices">
					<?php 
						$heading = $product->show_sub_products($db->connect(), $id); 
						foreach($heading as $key => $value) {
							$desc_decode = json_decode($value['description']);
							echo "<div class='col-md-3 linux-price'>
							<div class='linux-top'>
							<h4>".$value['prod_name']."</h4>
							</div>
							<div class='linux-bottom'>
								<h5>".$value['mon_price']."<span class='month'>per month</span></h5>
								<h6>Single Domain</h6>
								<ul>
								<li><strong>".$desc_decode->Webspace."</strong> Disk Space</li>
								<li><strong>".$desc_decode->Bandwidth."</strong> Data Transfer</li>
								<li><strong>".$desc_decode->Mailbox."</strong> Email Accounts</li>
								<li><strong>Supports </strong>  ".$desc_decode->Support."</li>
								<li><strong>No. of domains</strong>  $desc_decode->Free_domain</li>
								<li><strong>High Performance</strong>  Servers</li>
								<li><strong>location</strong> : <img src='images/india.png'></li>
								</ul>
							</div>
							<a href='add_to_cart.php?cart=".$value['id']."'>buy now</a>
						</div>";
						}
					?>
						<div class="clearfix"></div>
					</div>
				</div>
			
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
<!-- Features -->
<div class="whatdo">
	<div class="container">
		<h3><?php 
			$str = substr($html['prod_name'], 0, strrpos($html['prod_name'], ' '));
			echo $str;?> Features</h3>
		<div class="what-grids">
			<div class="col-md-4 what-grid">
				<div class="what-left">
				<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
				<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
				<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="what-grids">
			<div class="col-md-4 what-grid">
				<div class="what-left">
				<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
				<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
				<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>


<!-- Footer -->
<?php include "footer.php";?>