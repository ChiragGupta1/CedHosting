<?php
    if(isset($_SESSION)){

    } else {
        session_start();
    }
    if(!empty($_SESSION['email'])){
        $admin_check = $_SESSION['isadmin'];
        if($admin_check == 1) {
            
        } else {
            echo "<script>
                alert('You are not allowed to visit this page please login first!');
                window.location.replace('../login.php');
            </script>";
        }
    } else {
        echo "<script>
                alert('You are not allowed to visit this page please login first!');
                window.location.replace('../login.php');
            </script>";
    }
?>
<?php
        require_once "../class/Dbcon.php";
        $db = new Dbcon();
        require_once "../class/Product.php";
        $product = new Product();
?>
<?php 
if(isset($_POST['edit-btn'])) {
    $prod_id = isset($_POST['prod-parent-id'])?$_POST['prod-parent-id']:'';
    $id = isset($_POST['id'])?$_POST['id']:'';
    $name = isset($_POST['product-name'])?$_POST['product-name']:'';
    $link = isset($_POST['link'])?$_POST['link']:'';
    $monthly = isset($_POST['monthly'])?$_POST['monthly']:'';
    $annually = isset($_POST['annually'])?$_POST['annually']:'';
    $sku = isset($_POST['sku'])?$_POST['sku']:'';
    $description = array("Webspace"=>$_POST['web-space'],
                        "Bandwidth"=>$_POST['bandwidth'],
                        "Free_domain"=>$_POST['free-domain'],
                        "Support"=>$_POST['lang-tech-support'],
                        "Mailbox"=>$_POST['mail-box']);
    $description_encoded = json_encode($description);
    $check_similar_product_for_edit = $product->check_similar_product_for_edit($db->connect(), $id, $prod_id, $name);
    if($check_similar_product_for_edit > 0) {
        header("location: add_product.php?added=3");
    } else {
        $update_product = $product->update_product($db->connect(), $name, $id, $prod_id, $link, 1, $description_encoded, $monthly, $annually, $sku);
        if($update_product){
            header("location: add_product.php?added=1");
        }
        else{
            header("location: add_product.php?added=2");
        }
    }  
}
if(isset($_POST['add'])){
    $id = isset($_POST['id'])?$_POST['id']:'';
    $prod_id = isset($_POST['prod-parent-id'])?$_POST['prod-parent-id']:'';
    $name = isset($_POST['product-name'])?$_POST['product-name']:'';
    $link = isset($_POST['link'])?$_POST['link']:'';
    $monthly = isset($_POST['monthly'])?$_POST['monthly']:'';
    $annually = isset($_POST['annually'])?$_POST['annually']:'';
    $sku = isset($_POST['sku'])?$_POST['sku']:'';
    $description = array("Webspace"=>$_POST['web-space'],
                         "Bandwidth"=>$_POST['bandwidth'],
                         "Free_domain"=>$_POST['free-domain'],
                         "Support"=>$_POST['lang-tech-support'],
                         "Mailbox"=>$_POST['mail-box']);
    $description_encoded = json_encode($description);
        $check_similar_product = $product->check_similar_product($db->connect(), $prod_id, $name);
        if($check_similar_product > 0) {
            header("location: add_product.php?added=3");
        } else {
            $add_product = $product->add_product($db->connect(), $name, $prod_id, 1);
            $add_prod_description = $product->add_product_description($db->connect(), $add_product, $description_encoded, $monthly, $annually, $sku);
            if($add_prod_description){
                header("location: add_product.php?added=1");
            }
            else{
                header("location: add_product.php?added=2");
            }
        }    
}
?>