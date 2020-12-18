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
<?php include "header.php";?>
<table class="table w-25">
    <tr><th>Product Name</th>
    <th>Monthly Price</th>
    <th>Annual Price</th></tr>
<?php
if(isset($_GET['id'])){
    echo $_GET['id'];
    // unset($_SESSION['cart'][$_GET['id']]);
    // echo "<script>
    //     $(document).ready(function (){
    //         $('#".$_GET['id']."').hide();
    //     })
    // </script>";
}
    if(!in_array($_GET['id'], $_SESSION['cart'])) {
        for($i = 0; $i < count($_SESSION['cart']); $i++) {
            $show_products = $product->cart($db->connect(), $_SESSION['cart'][$i]);
            echo "<tr id='".$show_products['id']."'><td>".$show_products['prod_name']."</td>
            <td>".$show_products['mon_price']."</td>
            <td>".$show_products['annual_price']."</td>
            <td><a href='view_cart.php?id=".$show_products['id']."'>Delete</a></td></tr>";
        }
    } else {
        
    }
    
?>
</table>
<?php include "footer.php";?>