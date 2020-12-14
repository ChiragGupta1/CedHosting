	<?php
	if(isset($_SESSION)) {

	} else {
		session_start();
	}
		require_once "class/Product.php";
		$product = new Product();
		require_once "class/Dbcon.php";
		$db = new Dbcon();
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
								<a href="index.php"><img style="width: 80%; margin-top: 0px; padding: 0px;" src="images/logo.png" alt=""></a>
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
										$show_category = $product->show_category($db->connect(), 1);
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
								<?php
									if(isset($_SESSION['email'])) {
										echo $_SESSION['email'];
										$admin_check = $_SESSION['isadmin'];
										if($admin_check == 1) {

										} else if($admin_check == 0) {
											echo "<li><a href='logout.php'>Logout</a></li>";
										}
									} else {
										echo "<li><a href='login.php'>Login</a></li>";
									}
								?>
								
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>

