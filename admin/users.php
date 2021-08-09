<?php 
include '../core/dbconfig.php';
$name = "Users";
include 'include/header.php';
?>
<div class="container-fluid">
    <!-- <h4 style="color:black; font-family:sans-serif; font-size:40px;">Users</h4> -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Ph</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                   
                   $sql ="SELECT * FROM users ";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data ['id'];?></td>
                        <td><?php echo $data ['first_name'];?></td>
                        <td><?php echo $data ['last_name'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $data['password'];?></td>
                        <td><?php echo $data['phone'];?></td>
                        <td>
                            <button class="delid btn btn-danger" delid="<?php echo $data['id']?>">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php include 'include/footer.php';?>
<script>
    $(function () {
        $('.delid').on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("delid");
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    deluser: 1,
                    id: id
                },
                success: function (val) {
                    console.log(val);
                    console.log(val);
                    if (val == "1") {
                        alertSuccess('User Deleted!')
                    } else {
                        alertFailed();
                    }
                }
            })
        })
    })
</script>