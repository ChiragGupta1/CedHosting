<?php 
    class Product {
        public $prod_name, $prod_parent_id;

        function create_category ($con, $prod_name, $prod_parent_id, $prod_avail) {
            $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ($prod_parent_id,'".$prod_name."','',$prod_avail,NOW())";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function update_category ($con, $id, $prod_name, $prod_parent_id, $prod_avail) {
            $sql = "UPDATE `tbl_product` SET `prod_parent_id`= $prod_parent_id,`prod_name`='".$prod_name."',`link`='',`prod_available`= $prod_avail WHERE `id` = $id";
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
            $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ($prod_parent_id,'".$prod_name."','',$prod_avail,NOW())";
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
            $sql = "SELECT tbl_product_description.id, prod_id, description, mon_price, annual_price,sku, tbl_product.id, prod_parent_id, prod_name, link, prod_available, prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id";
            $result = mysqli_query($con, $sql);
            return $result;
        } 
        function update_product($con, $name, $prod_id, $link, $avail, $desc, $monthly, $annually, $sku){
            $sql = "UPDATE tbl_product_description td INNER JOIN tbl_product tp ON td.prod_id = tp.id SET 
            tp.prod_name = '".$name."', tp.prod_parent_id = $prod_id, tp.link = '".$link."', tp.prod_available = $avail, 
            td.description = '".$desc."', td.mon_price = $monthly, td.annual_price = $annually, td.sku = '".$sku."'";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function delete_product($con, $id) {
            $sql = "DELETE tbl_product, tbl_product_description    
            FROM    tbl_product    
            INNER JOIN tbl_product_description   
            ON tbl_product.id=tbl_product_description.prod_id 
            WHERE   tbl_product.id = $id;";
            $result = mysqli_query($con, $sql);
            return $result;
        }
    }
?>