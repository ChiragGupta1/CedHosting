<?php include "header.php";?>
    <!-- Header -->
    <?php
        $added = isset($_GET['added'])?$_GET['added']:'';
        if($added == 1) {
            echo "<script>
                    $(document).ready(function(){
                        $('#success').prop('hidden', false).slideUp(3000).text('Category Updated Successfully');
                    })
                </script>";
        } else if($added == 2) {
            echo "<script>
                    $(document).ready(function(){
                        $('#wrong').prop('hidden', false).slideUp(3000);
                    })
                </script>";
        }
    ?>
    <!-- Page Content -->
    <?php
    require_once "../class/Product.php";
    require_once "../class/Dbcon.php";
    $db = new Dbcon();
    $product = new Product();
        if(isset($_GET['editid'])) {
            $editid = isset($_GET['editid'])?$_GET['editid']:'';
            $name = isset($_GET['prod_name'])?$_GET['prod_name']:'';
            $parent = isset($_GET['parent'])?$_GET['parent']:'';
            $link = isset($_GET['link'])?$_GET['link']:'';
            $check = isset($_GET['check'])?$_GET['check']:'';
            echo "<script>
                $(document).ready(function (){
                    $('#edit-btn').prop('hidden', false);
                    $('#create-btn').prop('hidden', true);
                    $('#name').val('".$name."');
                    $('#parent').val('".$parent."')
                    $('#link').val('".$link."')
                })
            </script>";
            if($check) {
                echo "<script>
                $(document).ready(function (){
                    $('#check').prop('checked', true);
                })
            </script>";
            }
        } else {
            echo "<script>
                $(document).ready(function (){
                    $('#create-btn').prop('hidden', false);
                    $('#edit-btn').prop('hidden', true);
                })
            </script>";
        } 
        if(isset($_GET['deleteid'])){
            $del = $product->delete_category($db->connect(), $_GET['deleteid']);
            echo "<script>
                $(document).ready(function (){
                    $('#".$_GET['deleteid']."').prop('hidden', true);
                })
            </script>";
        }
    ?>
    <div class="alert alert-success w-50 mt-3 mx-auto category" role="alert" id="success" hidden>
        <strong>Category Created Successfully!</strong>
    </div>
    <div class="alert alert-danger w-50 mt-3 mx-auto category" role="alert" id="wrong" hidden>
        <strong>Something went wrong!</strong>
    </div>
    <div class="w-50 mx-auto my-5 px-5 rounded" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <form class="p-5" action="add_category.php" method="POST" >
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Product Name</label>
            <input class="form-control" type="text" id="name" name="product_name">
            <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $editid;?>">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Product Parent ID</label>
            <input class="form-control" type="number" id="parent" name="prod_parent_id">
        </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Link</label>
            <input class="form-control" type="url" id="link" name="link">
        </div>
        <div class="form-group">
        <label class="form-control-label">Product Availability</label><br>
        <label class="custom-toggle">
            <input type="checkbox" name="check" id="check">
            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
        </label>
        </div>
        <div class="form-group w-100">
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="create" value="CREATE" id="create-btn">
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="edit-btn" value="UPDATE" id="edit-btn">
        </div>
    </form>
    </div>
    <div class="w-100 mx-auto">
    <table id="category-table" class="text-center table" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th class="th-sm">Category ID
            </th>
            <th class="th-sm">Category Name
            </th>
            <th class="th-sm">Parent Category
            </th>
            <th class="th-sm">Availability
            </th>
            <th class="th-sm">Date Added
            </th>
            <th class="th-sm">Edit
            </th>
            <th class="th-sm">Remove
            </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $show_category = $product->show_category($db->connect(), 1);
                foreach ($show_category as $key => $value) {
                    echo "<tr id='".$value['id']."'>
                            <td>".$value['id']."</td>
                            <td>".$value['prod_name']."</td>";
                    $fetch = $product->check_parent($db->connect(), $value['prod_parent_id']);

                    echo "<td>".$fetch['prod_name']."</td>";
                    if ($value['prod_available'] == 1) {
                        echo "<td>Yes</td>
                            <td>".$value['prod_launch_date']."</td>
                            <td><a href='create_category.php?editid=".$value['id']."&prod_name=".$value['prod_name']."&parent=".$value['prod_parent_id']."&link=".$value['link']."&check=".$value['prod_available']."'><img style='width: 40%;' src='../images/pencil.png'></a></td>
                            <td><a onClick=\"javascript: return confirm('Are you sure?');\" href='create_category.php?deleteid=".$value['id']."'><img class='w-25' src='../images/remove.png'></a></td>
                        </tr>";
                    } else if ($value['prod_available'] == 0) {
                        echo "
                            <td>No</td>
                            <td>".$value['prod_launch_date']."</td>
                            <td><a href='create_category.php?editid=".$value['id']."&prod_name=".$value['prod_name']."&parent=".$value['prod_parent_id']."&link=".$value['link']."&check=".$value['prod_available']."'><img style='width: 40%;' src='../images/pencil.png'></a></td>
                            <td><a onClick=\"javascript: return confirm('Are you sure?');\" href='create_category.php?deleteid=".$value['id']."'><img class='w-25' src='../images/remove.png'></a></td>
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
            $('#category-table').DataTable();
        })
    </script>