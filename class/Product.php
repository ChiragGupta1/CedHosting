<?php 
    class Product {
        public $prod_name, $prod_parent_id;

        function create_category ($con, $prod_name, $prod_parent_id, $prod_avail) {
            $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES ($prod_parent_id,'".$prod_name."','',$prod_avail,NOW())";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function check_category ($con, $name) {
            $sql = "SELECT * FROM `tbl_product` WHERE `prod_name` = '".$name."'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_num_rows($result);
            return $row;
        }
        function check_category_for_edit ($con, $cat_name, $id) {
            $sql = "SELECT * FROM `tbl_product` WHERE `prod_name` = '".$cat_name."' AND `id` != $id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_num_rows($result);
            return $row;
        }
        function update_category ($con, $id, $prod_name, $prod_parent_id, $prod_avail) {
            $sql = "UPDATE `tbl_product` SET `prod_parent_id`= $prod_parent_id,`prod_name`='".$prod_name."',`html`='',`prod_available`= $prod_avail WHERE `id` = $id";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function show_category ($con, $id) {
            $sql = "SELECT * FROM `tbl_product` WHERE `prod_parent_id` = $id";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function check_parent ($con, $id){
            $sql = "SELECT * FROM `tbl_product` WHERE `id` = $id";
            $result = mysqli_query($con, $sql);
            $fetch = $result->fetch_assoc();
            return $fetch;
        }
        function delete_category ($con, $id) {
            $sql = "DELETE FROM `tbl_product` WHERE `id` = $id";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function add_product ($con, $prod_name, $prod_parent_id, $prod_avail) {
            $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES ($prod_parent_id,'".$prod_name."','',$prod_avail,NOW())";
            $result = mysqli_query($con, $sql);
            $row = mysqli_insert_id($con);
            return $row;
        }
        function add_product_description($con, $prod_id, $desc, $monthly, $annually, $sku) {
            $sql = "INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES (".$prod_id.",'".$desc."','".$monthly."','".$annually."','".$sku."')";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function show_products($con) {
            $sql = "SELECT tbl_product_description.id, prod_id, description, mon_price, annual_price,sku, tbl_product.id, prod_parent_id, prod_name, html, prod_available, prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id";
            $result = mysqli_query($con, $sql);
            return $result;
        } 
        function update_product($con, $name, $id, $prod_id, $link, $avail, $desc, $monthly, $annually, $sku){
            $sql = "UPDATE tbl_product_description td INNER JOIN tbl_product tp ON td.prod_id = tp.id SET 
            tp.prod_name = '".$name."', tp.prod_parent_id = $prod_id, tp.html = '".$link."', tp.prod_available = $avail, 
            td.description = '".$desc."', td.mon_price = $monthly, td.annual_price = $annually, td.sku = '".$sku."' WHERE tp.id = $id";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function delete_product($con, $id) {
            $sql = "DELETE tbl_product, tbl_product_description FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id WHERE tbl_product.id = $id;";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function show_sub_products($con, $id) {
            $sql = "SELECT tbl_product_description.id, prod_id, description, mon_price, annual_price,sku, tbl_product.id, prod_parent_id, prod_name, html, prod_available, prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id WHERE tbl_product.prod_parent_id = $id";
            $result = mysqli_query($con, $sql);
            return $result;
        } 
        function check_similar_product($con, $id, $name) {
            $sql = "SELECT tbl_product_description.id, prod_id, description, mon_price, annual_price,sku, tbl_product.id, prod_parent_id, prod_name, html, prod_available, prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id WHERE tbl_product.prod_parent_id = $id AND tbl_product.prod_name = '".$name."'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_num_rows($result);
            return $row;
        }
        function check_similar_product_for_edit($con, $id, $prod_id, $name) {
            $sql = "SELECT * FROM `tbl_product` WHERE `prod_name` = '".$name."' AND `id` != $id AND `prod_parent_id` = $prod_id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_num_rows($result);
            return $row;
        }
        function cart($con, $id) {
            $sql = "SELECT tbl_product_description.id, prod_id, description, mon_price, annual_price,sku, tbl_product.id, prod_parent_id, prod_name, html, prod_available, prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id WHERE tbl_product.id = $id";
            $result = mysqli_query($con, $sql);
            $fetch = mysqli_fetch_assoc($result);
            return $fetch;
        }
    }
?>