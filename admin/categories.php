<?php 
include '../core/dbconfig.php';
$name = "Categories";
include 'include/header.php';
?>
<div class="container-fliud">
    <div class="row">
        <div class="col-md-8">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                All Categories
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>timestamp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                        $s = 0;
                        $sql ="SELECT * FROM categories ";
                        $query =mysqli_query($conn,$sql);
                        while ($data = mysqli_fetch_array($query)) {
                        $s++;
                    ?>

                            <tr>
                                <th><?php echo $data['id'];?></th>
                                <th><?php echo $data['name'];?></th>
                                <th><?php echo $data['timestamp'];?></th>
                                <td>
                                    <a href="edit-cat.php?id=<?php echo $data['id'];?>">
                                        <button class="btn btn-success btn-sm" style="color:white;">Update</button>
                                    </a>

                                    <button class="btn btn-danger btn-sm delid"
                                        delid="<?php echo $data['id']; ?>">Delete</button>
                                </td>
                            </tr>
                            <?php };?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-4 ">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Add Categories
                            </h3>
                        </div>
                    </div>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right" id="formcat">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control form-control-md m-input" placeholder="Categories"
                                    name="name">
                                <span class="m-input-icon__icon m-input-icon__icon--left"><span>
                                        <i class="flaticon-more-v2"></i>
                                    </span></span>
                            </div>
                        </div>
                        <div class="m-form__actions">
                            <input type="hidden" name="newCategory">
                            <input type="submit" value="Submit" class="btn btn-success">
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php';?>
<script>
    $(function () {
        $('#formcat').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: $('#formcat').serialize(),
                success: function (val) {
                    console.log(val);
                    if (val == "1") {
                        alertSuccess('Category has been created!');
                    } else {
                        alertFailed();
                    }
                }
            })
        })
        $('.delid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delid");
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    delcat: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    console.log(val);
                    if (val == "1") {
                        alertSuccess('Category Deleted!')
                    } else {
                        alertFailed();
                    }
                }
            })
        })
    })
</script>