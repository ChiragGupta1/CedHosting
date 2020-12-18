
<?php include "header.php";?>

<?php
    $product_id = isset($_GET['cart'])?$_GET['cart']:'';
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
            array_push($_SESSION['cart'], $product_id);
            header("location: view_cart.php");
    } else {
        array_push($_SESSION['cart'], $product_id);
        header("location: view_cart.php");
    }
?>
<?php include "footer.php";?>