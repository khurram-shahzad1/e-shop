<?php 
$name = "Edit-products";
include 'include/header.php';
include '../core/dbconfig.php';

$proid = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM products WHERE id='$proid'"));
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <p class="alert alert-success alert-dismissible" id="alertSuccess" style="display: none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Category created!
            </p>
            <p class="alert alert-danger alert-dismissible" id="alertFailed" style="display: none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Something went wrong, try again later.
            </p>
            <div class="col-md-6 mt-5">
                <form id="formpro" class="">
                    <h6>Product Category: </h6>
                    <select name="catId" id="" class="form-control">
                        <option value="" hidden>Select One</option>
                        <?php 
                    $cats ="SELECT * FROM categories ";
                    $catsQ =mysqli_query($conn,$cats);
                    while ($data2 = mysqli_fetch_array($catsQ)) {
                ?>
                        <option value="<?php echo $data2['id']; ?>"
                            <?php if($data['cat_id'] == $data2['id']){echo 'selected'; } ?>>
                            <?php echo $data2['name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <br>
                    <h6>Product Name: </h6>
                    <input type="text" class="form-control" name="pname" value="<?php echo $data['name'];?>">
                    <br>
                    <h6>Product Price: </h6>
                    <input type="number" class="form-control" name="price" value="<?php echo $data['price'];?>">
                    <br>
                    <h6>Product Image: </h6>
                    <input type="file" class="" name="productImage">
                    <br>
                    <br>
                    <h6>Description</h6>
                    <textarea name="description" id="" rows="5"
                        class="form-control"><?php echo $data['description'];?></textarea>
                    <input type="hidden" name="formpro">
                    <input type="hidden" name="proid" value="<?php echo $data['id'];?>">
                    <br>
                    <input type="submit" class="btn btn-warning" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php';?>
<script>
    $('#formpro').on('submit', (function (e) {
        e.preventDefault();
        var updatedProduct = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'core/actions.php',
            data: updatedProduct,
            cache: false,
            contentType: false,
            processData: false,
            success: function (val) {
                console.log(val);
                if (val == "1") {
                    $("#alertSuccess").fadeIn();
                    $("#alertSuccess").fadeOut(3000);
                    setTimeout(() => {
                        location.replace('products.php');
                    }, 2000);
                } else {
                    $("#alertFailed").fadeIn();
                    $("#alertFailed").fadeOut(3000);
                }
            }
        });
    }));
</script>