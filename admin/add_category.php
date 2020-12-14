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
        include "../class/Dbcon.php";
        include "../class/Product.php";
        $db = new Dbcon();
        $product = new Product();
        
        if(isset($_POST['create'])) {
            $name = isset($_POST['product_name'])?$_POST['product_name']:'';
            $parent_id = isset($_POST['prod_parent_id'])?$_POST['prod_parent_id']:'';
            $link = isset($_POST['link'])?$_POST['link']:'';
            $prod_avail = isset($_POST['check'])?1:0;
            $add_category = $product->create_category($db->connect(), $name, $parent_id, $prod_avail);

            if($add_category) {
                header("location: create_category.php?added=1");
                
            } else {
                header("location: create_category.php?added=2");
                
            }
        }
        if(isset($_POST['edit-btn'])) {
            $id = isset($_POST['id'])?$_POST['id']:'';
            $name = isset($_POST['product_name'])?$_POST['product_name']:'';
            $parent_id = isset($_POST['prod_parent_id'])?$_POST['prod_parent_id']:'';
            $link = isset($_POST['link'])?$_POST['link']:'';
            $prod_avail = isset($_POST['check'])?1:0;
            $add_category = $product->update_category($db->connect(), $id, $name, $parent_id, $prod_avail);
            if($add_category) {
                header("location: create_category.php?added=1");
                
            } else {
                header("location: create_category.php?added=2");
                
            }
        }
    ?>