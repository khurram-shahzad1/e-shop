<?php 
include '../core/dbconfig.php';
$name = "Order";
include 'include/header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
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
                    </tr>
                </thead>
                <tbody>
                    <?php 
                   
                   $sql ="SELECT * FROM orders ";
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
                    ?>
                            <button class="btn btn-success acceptOrder" oid="<?php echo $data['id']; ?>">Accept</button>
                            <button class="btn btn-danger rejectOrder" oid="<?php echo $data['id']; ?>">Reject</button>
                            <?php }elseif($status == 1){ ?>
                            <button class="btn btn-danger processOrder"
                                oid="<?php echo $data['id']; ?>">Process</button>
                            <?php }
                    elseif($status == 2){ ?>
                            Processed
                            <?php }
                    elseif($status == 3){ ?>
                            Completed
                            <?php }
                    elseif($status == 4){ ?>
                            Rejected
                            <?php } ?>

                        </td>
                    </tr>
                    <?php };?>
                </tbody>
            </table>

        </div>


    </div>
</div>
<?php include 'include/footer.php';?>
<script>
    $(function () {
        $('.acceptOrder').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    acceptOrder: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
        $('.rejectOrder').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    rejectOrder: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
        $('.processOrder').on('click', function (e) {
            e.preventDefault();
            var orderId = $(this).attr('oid');
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: {
                    processOrder: orderId
                },
                success: function (val) {
                    console.log(val);
                    location.reload();
                }
            })
        })
    })
</script>