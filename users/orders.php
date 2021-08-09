<?php 
    include '../core/dbconfig.php';
    include 'include/header.php';
    $userId = $_COOKIE['users_id'];
?>
<div class="alert alert-success alert-dismissible" style="display:none;position: fixed;" id="alertSuccess">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Indicates a successful or positive action.
</div>
<div class="alert alert-success alert-dismissible" id="alertFailed" style="display:none;position: fixed;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Indicates a successful or positive action.
</div>
<div class="row mt-5">
    <div class="col-12">
        <table class="table table-dark table-hover table-responsive">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Address</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Status</th>
                <th>Timestamp</th>
            </tr>
            <?php 
                   
                   $sql ="SELECT * FROM orders WHERE `user_id` = '$userId'";
                   $query =mysqli_query($conn,$sql);
                   while ($data = mysqli_fetch_array($query)) {
                       $user = $data['user_id'];
                       $prodId = $data['order'];
                       $fn = mysqli_fetch_array(mysqli_query($conn, "SELECT first_name FROM users WHERE id = '$user'"))[0];
                       $add_id = $data['address_id'];
                       $add = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM addresses WHERE id = '$add_id'"));
                       $prod = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products WHERE id = '$prodId'"));
                ?>
            <tr>
                <td><?php echo $data ['order_no'];?></td>
                <td><?php echo $fn;?></td>
                <td><?php echo $add['title'] . ' - ' . $add['address'];?></td>
                <td><?php echo $prod['name'];?></td>
                <td><?php echo $data['qty'];?></td>
                <td><?php echo $data['price'];?></td>
                <td><?php echo $data['total'];?></td>
                <td><?php echo $data['paid'];?></td>
                <td>
                    <?php 
                        $status = $data['status'];
                        if($status == 0){
                            echo "Placed"; 
                        }elseif($status == 1){
                            echo "Accepted";
                        }elseif($status == 2){
                            echo "Processed";
                        }elseif($status == 3){
                            echo "Completed";
                        }elseif($status == 4){
                            echo "Rejected";
                        }
                        ?>
                    <?php
                         $status = $data['status'];
                         if($status == 2){
                        ?>
                    <button class="btn btn-success acceptOrder1" oid="<?php echo $data['id'];?>">Accept</button>

                    <?php } ?>

                </td>
                <td><?php echo $data['timestamp'];?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<?php include 'include/footer.php'; ?>
<script>
    $(function () {
        $('.acceptOrder1').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    acceptOrder1: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })

    })
</script>