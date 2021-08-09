<?php 
    include '../core/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Cart | E-Shopper</title>
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
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +92 305 1718 043</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
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
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse"
								data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
			</div>
			<div class="table-responsive cart_info">
				<?php if(isset($_COOKIE['cart'])){ ?>
				<table class="table table-condensed">

					<tr class="cart_menu">
						<td class="#">#</td>
						<td class="name">Name</td>
						<td class="image">Image</td>
						<td class="quantity">Quantity</td>
						<td class="price">Price</td>
						<td class="action">Action</td>
						<td></td>
					</tr>
					<?php
                $cartIds = $_COOKIE['cart'];
                $cart = explode(',',$cartIds);
                $cartUnique = array_unique($cart);
                $cartCount = array_count_values($cart);
                $s = 1;
                $total = 0;
                foreach ($cartUnique as $value) {
                    $pid = $value;
                    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'");
                    $data = mysqli_fetch_array($query);
                    $qty = $cartCount[$data['id']];
                    $total += $data['price'] * $qty;
                    $price = $data['price'] * $qty;
            ?>
					<tr>
						<td><?php echo $s++; ?></td>
						<td class="name">
							<?php echo $data['name']; ?>
						</td>
						<td class="image">
							<img src="../assets/uploads/<?php echo $data['image']; ?>" width="50px" height="50px alt="">
							</td>
							<td class=" quantity">
							<?php echo $qty; ?>
						</td>
						<td class="price">
							Rs. <?php echo $price; ?>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<buton class="btn btn-warning  addProd" prodId="<?php echo $data['id']; ?>">+</buton>
								<buton class="btn btn-warning removeProd" prodId="<?php echo $data['id']; ?>">-</buton>
							</div>
						</td>
					</tr>
					<?php } ?>
				</table>
				<td class="cart_total">
					<p class="cart_total_price">Total: Rs. <?php echo $total; ?></p>
				</td>

				<?php }else{ ?>
				<h2>No items in the cart</h2>
				<?php } ?>
			</div>
			<a href="core/actions.php?checkLoginStatus=1">
				<button class="btn btn-warning">Checkout</button>
			</a>
		</div>
	</section>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
<script>
	$(function () {
		$('.removeProd').on('click', function (e) {
			e.preventDefault();
			var prodId = $(this).attr('prodId');
			$.ajax({
				url: 'core/actions.php',
				type: 'POST',
				data: {
					removeFromCart: prodId
				},
				success: function (val) {
					console.log(val);
					location.reload();
				}
			})
		})
		$('.addProd').on('click', function (e) {
			e.preventDefault();
			var prodId = $(this).attr('prodId');
			$.ajax({
				url: 'core/actions.php',
				type: 'POST',
				data: {
					duplicateProd: prodId
				},
				success: function (val) {
					console.log(val);
					location.reload();
				}
			})
		})
	})
</script>