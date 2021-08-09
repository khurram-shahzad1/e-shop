<?php 
include '../core/dbconfig.php';
$name = "Inventory";
include 'include/header.php';
?>
<div class="container-fliud">
    <div class="row">
        <div class="col-12">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                inventory
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Stock In</th>
                                <th>Stock Out</th>
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
                                <td><?php echo $s;?></td>
                                <td><?php echo $fetchCat['name'];?></td>
                                <td><?php echo $data['name'];?></td>
                                <td><img src="../assets/uploads/<?php echo $data['image'];?>" width="100px"
                                        height="100px" alt=""></td>
                                <td><?php echo $data['inventory'];?></td>
                                <td>
                                    <input type="number" class="form-control" style="width:100px;border-color: black; "
                                        id="i<?php echo $data['id'];?>">
                                    <br>
                                    <button class="btn btn-sm btn-success addInventory"
                                        pid="<?php echo $data['id'];?>">Save</button>
                                </td>
                                <td>
                                    <input type="number" class="form-control" style="width:100px;border-color: black;"
                                        id="">
                                    <br>
                                    <button class="btn btn-sm btn-success delInventory"
                                        pid="<?php echo $data['id'];?>">Save</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
<?php include 'include/footer.php';?>
<script>
    $(function () {
        $('.addInventory').on('click', (function (e) {
            e.preventDefault();
            var pid = $(this).attr('pid');
            var val = $('#i' + pid).val();
            console.log(val);
            $.ajax({
                type: 'POST',
                url: 'core/actions.php',
                data: {
                    addInventory: pid,
                    value: val
                },
                success: function (data) {
                    console.log(data);
                    location.reload();
                }
            });
        }));
        $('.delInventory').on('click', (function (e) {
            e.preventDefault();
            var pid = $(this).attr('pid');
            var val = $(this).parent().children('input').val();
            console.log(val);
            $.ajax({
                type: 'POST',
                url: 'core/actions.php',
                data: {
                    delInventory: pid,
                    value: val
                },
                success: function (data) {
                    console.log(data);
                    location.reload();
                }
            });
        }));
    })
</script>