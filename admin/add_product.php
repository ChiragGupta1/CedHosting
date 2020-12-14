<?php include "header.php";?>
	<!-- Header -->
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
    <form class="w-50 mx-auto my-5 p-5 rounded" action="add_prod_logic.php" method="POST" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Product Category</label>
            <select name="prod-parent-id" id="parentid" class="form-control">
                <?php
                    $show_category = $product->show_category($db->connect(), 1);
                    foreach($show_category as $key => $value) {
                        echo "<option value='".$value['id']."'>".$value['prod_name']."</option>";
                    }   
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Product Name</label>
            <input class="form-control" type="text" id="name" name="product-name" onfocusout="validate(this);" pattern="" required><small id="small-name" hidden></small>
            <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $_GET['editid'];?>"> </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Product URL</label>
            <input class="form-control" type="text" id="link" name="link"> </div>
        <hr class="my-3">
        <h2>Product Description</h2>
        <hr class="my-3">
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Monthly Price</label>
            <input class="form-control" type="text" id="month" name="monthly" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required> </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Annual Price</label>
            <input class="form-control" type="text" id="annual" name="annually" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required> </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">SKU</label>
            <input class="form-control" type="text" id="sku" name="sku" pattern="^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$" onfocusout="validate(this);" required> </div>
        <hr class="my-3">
        <h2>Features</h2>
        <hr class="my-3">
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Web Space(in GB)</label>
            <input class="form-control" type="text" id="webspace" name="web-space" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required> <small>Enter 0.5 for 512 MB</small> </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Bandwidth (in GB)</label>
            <input class="form-control" type="text" id="bandwidth" name="bandwidth" pattern='([0-9]+(\.[0-9]+)?)' onfocusout="validate(this);" required> <small>Enter 0.5 for 512 MB</small> </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Free Domain</label>
            <input class="form-control" type="text" id="free-domain" name="free-domain" pattern="((^[0-9]*$)|(^[A-Za-z]+$))" onfocusout="validate(this);" required> <small>Enter 0 for no domain available in this service</small> </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Language/Technology Support</label>
            <input class="form-control" type="text" id="support" name="lang-tech-support" onfocusout="validate(this);" required> <small>Separate by (,) Ex: PHP, MySQL, MongoDB</small> </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">MailBox</label>
            <input class="form-control" type="text" id="mailbox" name="mail-box" onfocusout="validate(this);" pattern="((^[0-9]*$)|(^[A-Za-z]+$))" required> <small>Enter Number of mailbox will be provided, enter 0 if none</small> </div>
        <input id="add-btn" type="submit" class="btn btn-primary btn-lg btn-block" name="add" value="ADD">
        <input id="edit-btn" type="submit" class="btn btn-primary btn-lg btn-block" name="edit-btn" value="UPDATE"> </form>
</div>
<!-- Footer -->
<?php include "footer.php";?>