<?php 
$name = "Edit-categories";
include 'include/header.php';
include '../core/dbconfig.php';

$catid = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categories WHERE id='$catid'"));

?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <p class="alert alert-success alert-dismissible" id="alertSuccess" style="display: none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Category created!
            </p>
            <p class="alert alert-danger alert-dismissible" id="alertFailed" style="display: none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Something went wrong, try again later.
            </p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3>Add Categories</h3>
                <form id="formCat">
                    <input type="text" name="name" value="<?php echo $data['name'];?>" required><br>
                    <input type="hidden" name="updateCat"><br>
                    <input type="hidden" name="catid" value="<?php echo $data['id'];?>">
                    <input type="submit" value="Submit" class="btn btn-danger">
                </form>
            </div>
        </div>
        <?php include 'include/footer.php';?>
        <script>
            $(function () {
                $('#formCat').on('submit', function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'core/actions.php',
                        type: 'POST',
                        data: $('#formCat').serialize(),
                        success: function (val) {
                            console.log(val);
                            console.log(val);
                            if (val == "1") {
                                $('#alertSuccess').fadeIn();
                                $('#alertSuccess').fadeOut(2000);
                                // document.getElementById('formCat').reset();
                                setTimeout(() => {
                                    location.replace('categories.php')
                                }, 2000);
                                // location.reload();
                            } else {
                                $('#alertFailed').fadeIn();
                                $('#alertFailed').fadeOut(2000);
                            }
                        }
                    })
                })
            })
        </script>