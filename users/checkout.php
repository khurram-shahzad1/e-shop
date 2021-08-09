<?php 
    include '../core/dbconfig.php';
	$userId = $_COOKIE['users_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <header id="header">
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="color: balck;">Checkout</h2>
                <?php if(isset($_COOKIE['cart'])){ ?>
                <?php
                $cartIds = $_COOKIE['cart'];
                $cart = explode(',',$cartIds);
                $cartUnique = array_unique($cart);
                $cartCount = array_count_values($cart);
                $total = 0;
                foreach ($cartUnique as $value) {
                    $pid = $value;
                    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'");
                    $data = mysqli_fetch_array($query);
                    $qty = $cartCount[$data['id']];
                    $total += $data['price'] * $qty;
                 } 
                ?>
                </table>
                <h2 style="color: orange">Total: Rs. <?php echo $total; ?></h2>
                <form id="placeOrder">
                    <h6 style="color: black;">Address (Select One)</h6>
                    <?php
                    $q = mysqli_query($conn, "SELECT * FROM addresses WHERE `user_id` = '$userId'");
                    while ($d = mysqli_fetch_array($q)) {
                 ?>
                    <label style="color: black;">
                        <input type="radio" required name="address" value="<?php echo $d['id']; ?>">
                        <?php echo $d['title'] . " - " . $d['address'] . ", " . $d['city'] . ", " . $d['state'] . ", " . $d['country']; ?>
                    </label>
                    <br>
                    <?php } ?>
                    <input type="hidden" name="placeOrder" value="<?php echo $userId; ?>">
                    <input type="submit" value="Place Order" class="btn btn-success">
                </form>
                <?php }else{ ?>
                <h2>No items in the cart</h2>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>