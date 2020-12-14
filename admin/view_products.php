<!-- Header -->
<?php include "header.php";?>
<!-- Page Content -->
<?php
    if(isset($_SESSION)){

    } else {
        session_start();
    }
    if(!empty($_SESSION['email'])){
        $admin_check = $_SESSION['isadmin'];
        if($admin_check == 1) {
            require_once "../class/Dbcon.php";
            require_once "../class/Product.php";
            $db = new Dbcon();
            $product = new Product();
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
    if(isset($_GET['deleteid'])) {
        $deleteid = $product->delete_product($db->connect(), $_GET['deleteid']);
        echo " <script>
        $(document).ready(function(){
            $('#".$_GET['deleteid']."').hide();
        })
    </script>";
    }
?>
<div class="w-100 mx-auto">
    <table id="product-table" class="text-center table my-5" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th class="th-sm">Product ID
            </th>
            <th class="th-sm">Product Name
            </th>
            <th class="th-sm">Parent Name
            </th>
            <th class="th-sm">Description
            </th>
            <th class="th-sm">Monthly Price
            </th>
            <th class="th-sm">Annual Price
            </th>
            <th class="th-sm">SKU ID
            </th>
            <th class="th-sm">Link
            </th>
            <th class="th-sm">Available
            </th>
            <th class="th-sm">Date Added
            </th>
            <th class="th-sm">Edit
            </th>
            <th class="th-sm">Delete
            </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $show_products = $product->show_products($db->connect());
                foreach ($show_products as $key => $value) {
                    $desc_decode = json_decode($value['description']);
                    echo "<tr id='".$value['prod_id']."'>
                            <td>".$value['prod_id']."</td>
                            <td>".$value['prod_name']."</td>";
                    $fetch = $product->check_parent($db->connect(), $value['prod_parent_id']);

                    echo "<td>".$fetch['prod_name']."</td>";
                    if ($value['prod_available'] == 1) {
                        echo "
                            <td class='text-left'><ol><li>Webspace : ".$desc_decode->Webspace."</li>
                            <li>Bandwidth : ".$desc_decode->Bandwidth."</li>
                            <li>Free Domain : ".$desc_decode->Free_domain."</li>
                            <li>Support : ".$desc_decode->Support."</li>
                            <li>Mailbox : ".$desc_decode->Mailbox."</li></ol></td>
                            <td>".$value['mon_price']."</td>
                            <td>".$value['annual_price']."</td>
                            <td>".$value['sku']."</td>
                            <td>".$value['link']."</td>
                            <td>Yes</td>
                            <td>".$value['prod_launch_date']."</td>
                            <td><a href='add_product.php?editid=".$value['prod_id']."&prod_name=".$value['prod_name']."&parent=".$value['prod_parent_id']."&link=".$value['link']."&check=".$value['prod_available']."&desc=".$value['description']."&mon=".$value['mon_price']."&annual=".$value['annual_price']."&sku=".$value['sku']."'><img style='width: 40%;' src='../images/pencil.png'></a></td>
                            <td><a onClick=\"javascript: return confirm('Are you sure?');\" href='view_products.php?deleteid=".$value['id']."'><img class='w-25' src='../images/remove.png'></a></td>
                        </tr>";
                    } else if ($value['prod_available'] == 0) {
                        echo "
                            <td class='text-left'><ol><li>Webspace : ".$desc_decode->Webspace."</li>
                            <li>Bandwidth : ".$desc_decode->Bandwidth."</li>
                            <li>Free Domain : ".$desc_decode->Free_domain."</li>
                            <li>Support : ".$desc_decode->Support."</li>
                            <li>Mailbox : ".$desc_decode->Mailbox."</li></ol></td>
                            <td>".$value['mon_price']."</td>
                            <td>".$value['annual_price']."</td>
                            <td>".$value['sku']."</td>
                            <td>".$value['link']."</td>
                            <td>No</td>
                            <td>".$value['prod_launch_date']."</td>
                            <td><a href='add_product.php?editid=".$value['prod_id']."&prod_name=".$value['prod_name']."&parent=".$value['prod_parent_id']."&link=".$value['link']."&check=".$value['prod_available']."&desc=".$value['description']."&mon=".$value['mon_price']."&annual=".$value['annual_price']."&sku=".$value['sku']."'><img style='width: 40%;' src='../images/pencil.png'></a></td>
                            <td><a onClick=\"javascript: return confirm('Are you sure?');\" href='view_products.php?deleteid=".$value['id']."'><img class='w-25' src='../images/remove.png'></a></td>
                        </tr>";
                    }
                }
            ?>  
        </tbody>
    </table>
    </div> 


<!-- Footer -->
<?php include "footer.php";?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#product-table').DataTable();
            $('#<?php if(isset($_GET['deleteid'])){echo $_GET['deleteid'];}?>').hide();
        })
    </script>