<?php include "header.php";?>
	<!-- Header -->
    <?php
        $added = isset($_GET['added'])?$_GET['added']:'';
        if($added == 1) {
            echo "<script>
                    $(document).ready(function(){
                        $('#success').prop('hidden', false).slideUp(3000).text('Product Added Successfully');
                    })
                </script>";
        } else if($added == 2) {
            echo "<script>
                    $(document).ready(function(){
                        $('#wrong').prop('hidden', false).slideUp(3000);
                    })
                </script>";
        } else if($added == 3) {
            echo "<script>
                    $(document).ready(function(){
                        $('#wrong').prop('hidden', false).slideUp(3000).text('Similar Product already exists!');
                    })
                </script>";
        }
    ?>
	<?php
        require_once "../class/Dbcon.php";
        $db = new Dbcon();
        require_once "../class/Product.php";
        $product = new Product();

        if(isset($_GET['editid'])) {
            $prod_name = isset($_GET['prod_name'])?$_GET['prod_name']:'';
            $link = isset($_GET['link'])?$_GET['link']:'';
            $parent_id = isset($_GET['parent'])?$_GET['parent']:'';
            $desc = isset($_GET['desc'])?$_GET['desc']:'';
            $desc = json_decode($desc);
            $monthly = isset($_GET['mon'])?$_GET['mon']:'';
            $annual = isset($_GET['annual'])?$_GET['annual']:'';
            $sku = isset($_GET['sku'])?$_GET['sku']:'';
            echo "<script>
                $(document).ready(function (){
                    $('#edit-btn').prop('hidden', false);
                    $('#add-btn').prop('hidden', true);
                    $('#parentid').val('".$parent_id."');
                    $('#name').val('".$prod_name."');
                    $('#link').val('".$link."');
                    $('#month').val('".$monthly."');
                    $('#annual').val('".$annual."');
                    $('#sku').val('".$sku."');
                    $('#webspace').val('".$desc->Webspace."');
                    $('#bandwidth').val('".$desc->Bandwidth."');
                    $('#free-domain').val('".$desc->Free_domain."');
                    $('#support').val('".$desc->Support."');
                    $('#mailbox').val('".$desc->Mailbox."');
                })
            </script>";
        } else {
            echo "<script>
                $(document).ready(function (){
                    $('#edit-btn').prop('hidden', true);
                    $('#add-btn').prop('hidden', false);
                })
            </script>";
        }
?>
<!-- Page Content -->
<div class="container">
<div class="alert alert-success w-50 mt-3 mx-auto category" role="alert" id="success" hidden>
        <strong>Category Created Successfully!</strong>
    </div>
    <div class="alert alert-danger w-50 mt-3 mx-auto category" role="alert" id="wrong" hidden>
        <strong>Something went wrong!</strong>
    </div>
    <form id="product-form" class="w-50 mx-auto my-5 p-5 rounded" action="add_prod_logic.php" method="POST" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="form-group rounded p-3">
            <label for="example-search-input" class="form-control-label">Product Category</label><label class="text-danger"> *</label>
            <select name="prod-parent-id" id="parentid" class="form-control">
                <?php
                    $show_category = $product->show_category($db->connect(), 1);
                    foreach($show_category as $key => $value) {
                        echo "<option value='".$value['id']."'>".$value['prod_name']."</option>";
                    }   
                ?>
            </select>
        </div>
        <div class="form-group rounded p-3" id="name-div">
            <label for="example-text-input" class="form-control-label">Product Name</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="name" name="product-name" pattern="^[a-zA-Z0-9]*-?[a-zA-Z]+-?[0-9]*(-?([a-zA-Z0-9]*-?[a-zA-Z]+-?[0-9]*)+)*$" onfocusout="validate(this);" required><small id="small-name" hidden>Enter 0.5 for 512 MB</small>
            <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $_GET['editid'];?>"> </div>
        <div class="form-group rounded p-3" id="link-div">
            <label for="example-email-input" class="form-control-label">Product HTML</label>
            <textarea class="form-control" id="html" rows="3" name="link"></textarea></div>
        <hr class="my-3">
        <h2>Product Description</h2>
        <hr class="my-3">
        <div class="form-group rounded p-3" id="month-div">
            <label for="example-email-input" class="form-control-label">Monthly Price</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="month" name="monthly" maxlength="15" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required><small id="small-month" hidden>Enter 0.5 for 512 MB</small> </div>
        <div class="form-group rounded p-3" id="annual-div">
            <label for="example-email-input" class="form-control-label">Annual Price</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="annual" name="annually" maxlength="15" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required><small id="small-annual" hidden>Enter 0.5 for 512 MB</small> </div>
        <div class="form-group rounded p-3" id="sku-div">
            <label for="example-email-input" class="form-control-label">SKU</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="sku" name="sku" pattern="^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$" onfocusout="validate(this);" required><small id="small-sku" hidden>Enter 0.5 for 512 MB</small> </div>
        <hr class="my-3">
        <h2>Features</h2>
        <hr class="my-3">
        <div class="form-group rounded p-3" id="web-div">
            <label for="example-email-input" class="form-control-label">Web Space(in GB)</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="webspace" name="web-space" maxlength="5" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required> <small id="small-webspace">Enter 0.5 for 512 MB</small> </div>
        <div class="form-group rounded p-3" id="band-div">
            <label for="example-email-input" class="form-control-label">Bandwidth (in GB)</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="bandwidth" name="bandwidth" maxlength="5" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required> <small id="small-bandwidth">Enter 0.5 for 512 MB</small> </div>
        <div class="form-group rounded p-3" id="domain-div">
            <label for="example-email-input" class="form-control-label">Free Domain</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="free-domain" name="free-domain" pattern="((^[0-9]*$)|(^[A-Za-z]+$))" onfocusout="validate(this);" required> <small id="small-domain">Enter 0 for no domain available in this service</small> </div>
        <div class="form-group rounded p-3" id="lang-div">
            <label for="example-email-input" class="form-control-label">Language/Technology Support</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="support" name="lang-tech-support" pattern="^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$" onfocusout="validate(this);" required> <small id="small-support">Separate by (,) Ex: PHP, MySQL, MongoDB</small> </div>
        <div class="form-group rounded p-3" id="mail-div">
            <label for="example-email-input" class="form-control-label">MailBox</label><label class="text-danger"> *</label>
            <input class="form-control" type="text" id="mailbox" name="mail-box" onfocusout="validate(this);" pattern="((^[0-9]*$)|(^[A-Za-z]+$))" required> <small id="small-mailbox">Enter Number of mailbox will be provided, enter 0 if none</small> </div>
        <input id="add-btn" type="submit" class="btn btn-primary btn-lg btn-block " name="add" value="ADD">
        <input id="edit-btn" type="submit" class="btn btn-primary btn-lg btn-block ml-3 mr-3" name="edit-btn" value="UPDATE"> </form>
</div>
<!-- Footer -->
<?php include "footer.php";?>
<!--name ^([A-z]+\-\d+(\.\d+)*)$|^([A-z])+$ -->