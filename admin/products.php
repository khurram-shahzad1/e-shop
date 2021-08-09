<?php 
include '../core/dbconfig.php';
$name = "products";
include 'include/header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Timestamp</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $s = 0;
                    $products =mysqli_query($conn,"SELECT * FROM products ");
                    while ($data = mysqli_fetch_array($products)) {
                        $s++;
                        $catId = $data['cat_id'];
                        $fetchCat = mysqli_query($conn, "SELECT * FROM categories WHERE id = '$catId'");
                        $fetchCat = mysqli_fetch_array($fetchCat);
                ?>
                    <tr>
                    <tr>
                        <td><?php echo $s;?></td>
                        <td class="changeCat">
                            <span class="catName">
                                <?php echo $fetchCat['name'];?>
                            </span>
                            <select class="custom-select form-control updateCat" pid="<?php echo $data['id']; ?>" style="display:none">
                                <?php 
                                    $cats ="SELECT * FROM categories ";
                                    $catsQ =mysqli_query($conn,$cats);
                                    while ($data2 = mysqli_fetch_array($catsQ)) {
                                ?>
                                <option value="<?php echo $data2['id']; ?>" <?php if($fetchCat['id'] == $data2['id']){echo 'selected';}; ?>><?php echo $data2['name']; ?></option>
                            <?php } ?>
                        </select>
                        </td>
                        <td class="updateName" pid="<?php echo $data['id']; ?>"><?php echo $data['name'];?></td>
                        <td class="updateName" pid="<?php echo $data['id'];?>"><?php echo $data['price'];?></td>
                        <td class="updateName" pid="<?php echo $data['id'];?>"><?php echo $data['description'];?></td>
                        <td><img src="assets/uploads/<?php echo $data['image'];?>" width="100px" height="100px"></td>
                        <td><?php echo $data['timestamp'];?></td>
                        <td>
                            <a href="edit-pro.php?id=<?php echo $data['id']; ?>">
                                <button class="btn btn-success btn-sm" style="color:white;">Update</button>
                            </a>
                            <button class="btn btn-danger btn-sm delid" delid="<?php echo $data['id']?>">Delete</button>
                        </td>
                    </tr>
                    <?php };?>
                </tbody>
            </table>
        </div>

        <div class="col-md-5 mt-5">
            <form class="m-form m-form--fit m-form--label-align-right" id="newProduct">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                    </div>
                    <div class="form-group1 m-form__group">
                        <label>Category</label>
                        <div></div>
                        <select class="custom-select form-control" name="catId">
                            <option value="" hidden>Select Categories</option>
                            <?php 
                                $cats ="SELECT * FROM categories ";
                                $catsQ =mysqli_query($conn,$cats);
                                while ($data2 = mysqli_fetch_array($catsQ)) {
                            ?>
                            <option value="<?php echo $data2['id']; ?>"><?php echo $data2['name']; ?></option>
                            <?php } ?>
                        </select>
                        <label for="">Product Name:</label>
                        <input type="text" class="form-control form-control-sm" name="pname" placeholder="Product">
                        <label for="">Price $</label>
                        <input type="number" class="form-control form-control-sm" name="price" placeholder="Price">

                        <div class="form-group l-form__group">
                            <label for="exampleInputEmail1">File Browser</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="productImage">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <label for="">Discription</label>
                        <textarea name="description" id="" rows="5" class="form-control"></textarea>
                        <input type="hidden" name="newProduct">
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<?php include 'include/footer.php';?>
<script>
    $(function () {
        $('#newProduct').on('submit', (function (e) {
            e.preventDefault();
            var newProductForm = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'core/actions.php',
                data: newProductForm,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    if (data == "1") {
                        alertSuccess('Product Created!');
                        document.getElementById("newProduct").reset();
                    } else {
                        alertFailed();

                    }
                }
            });
        }));
        $('.delid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delid");
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    delProduct: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        alertFailed();
                    } else {
                        alertSuccess('Product Deleted')
                    }
                }
            })
        })
        $('.updateName').on('dblclick', function (e) {
            e.preventDefault();
            var pid = $(this).attr("pid");
            var value = $(this).html();
            if (value[0] != "<") {
                console.log(pid);
                $(this).html('<input type="text" class="form-control newName" pid="' + pid +
                    '" value="' + value + '">');
            }
        })
        $('.changeCat').on('dblclick', function (e) {
            e.preventDefault();
            $(this).children(".catName").fadeOut(0);
            $(this).children("select").fadeIn();
        })
        $('.updateCat').on('change', function (e) {
            e.preventDefault();
            var ele = $(this);
            var pid = $(this).attr('pid');
            var newCat = $(this).val();
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    updateProdCat: pid,
                    newCat: newCat
                },
                success: function (val) {
                    console.log(val);
                    ele.fadeOut(0);
                    ele.parent().children('.catName').html(val);
                    ele.parent().children('.catName').fadeIn();
                }
            })
            // $(this).children(".catName").fadeOut(0);
            // $(this).children("select").fadeIn();
        })
        $(document).on('keypress', function (e) {
            console.log(e.which);
            if (e.which == 13) {
                $('.newName').each(function (e) {
                    var newName = $(this).val();
                    var pid = $(this).attr('pid');
                    console.log(newName);
                    $(this).parent().html(newName);
                    $.ajax({
                        url: 'core/actions.php',
                        type: 'POST',
                        data: {
                            updateProdName: pid,
                            newName: newName
                        },
                        success: function (val) {}
                    })
                })
            }
        });
        $(document).on('click', function (e) {
            if (!$(e.target).hasClass('newName')) {
                $('.newName').each(function (e) {
                    var newName = $(this).val();
                    var pid = $(this).attr('pid');
                    console.log(newName);
                    $(this).parent().html(newName);
                    $.ajax({
                        url: 'core/actions.php',
                        type: 'POST',
                        data: {
                            updateProdName: pid,
                            newName: newName
                        },
                        success: function (val) {}
                    })
                })
            }
        });
    })
</script>