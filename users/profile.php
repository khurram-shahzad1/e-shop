<?php include '../core/dbconfig.php';
include 'include/header.php';

$userId = $_COOKIE['users_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Store</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-success alert-dismissible" id="alertSuccess" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Address Successfully!
                </p>
                <p class="alert alert-danger alert-dismissible" id="alertdanger" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Something went wrong.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-9 mt-5">
                <table class="table table-dark table-hover">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Added</th>
                    </tr>
                    <?php 
                $s = 1;
                $query = mysqli_query($conn, "SELECT * FROM addresses WHERE `user_id` = '$userId'");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $s++; ?></td>
                        <td><?php echo $data['title']; ?></td>
                        <td><?php echo $data['address']; ?></td>
                        <td><?php echo $data['city']; ?></td>
                        <td><?php echo $data['state']; ?></td>
                        <td><?php echo $data['country']; ?></td>
                        <td><?php echo $data['timestamp']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col-3 mt-5">
                <form id="addAddress">
                    <h6>Title</h6>
                    <input type="text" class="form-control" name="title">
                    <br>
                    <h6>Address</h6>
                    <input type="text" class="form-control" name="address">
                    <br>
                    <h6>City</h6>
                    <input type="text" class="form-control" name="city">
                    <br>
                    <h6>State</h6>
                    <input type="text" class="form-control" name="state">
                    <br>
                    <h6>Country</h6>
                    <input type="text" class="form-control" name="country">
                    <br>
                    <input type="hidden" name="addAddress" value="<?php echo $userId; ?>">
                    <input type="submit" value="Save" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
    <script src="js/vendor/jquery-v3.4.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/magnific-popup.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nivo.slider.js"></script>
    <script src="js/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</html>
<script>
    $(function () {
        $('#addAddress').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: 'core/actions.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (val) {
                    console.log(val);
                    if (val == "0") {
                        $('#alertdanger').fadeIn();
                        $('#alertdanger').fadeOut(2000);
                    } else {
                        $("#alertSuccess").fadeIn();
                        $('#alertSuccess').fadeOut(2000);
                        document.getElementById('Loginform');
                        setTimeout(() => {
                            location.replace('profile.php');
                        }, 2000);
                    }
                }
            })
        })
    })
</script>
<?php include 'include/footer.php';?>