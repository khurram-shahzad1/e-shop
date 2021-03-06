<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login | E-Shopper</title>
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
					<div class="col-md-12">
						<p class="alert alert-success alert-dismissible" id="alertSuccess" style="display: none;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							Login Successfully!
						</p>
						<p class="alert alert-danger alert-dismissible" id="alertdanger" style="display: none;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							Something went wrong.
						</p>
						<p class="alert alert-success alert-dismissible" id="alertSuccess1" style="display: none;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							Sign Up Successfully!
						</p>
						<p class="alert alert-danger alert-dismissible" id="alertdanger1" style="display: none;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							Something went wrong.
						</p>
					</div>
					<div class="row">
						<div class="col-sm-6">
						</div>
						<div class="col-sm-6">
							<div class="social-icons pull-right">
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
									<li><a href="index.html">Home</a></li>
							</div>
						</div>
						<div class="col-sm-3">
						</div>
					</div>
				</div>
			</div>
	</header>
	<section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Login to your account</h2>
						<form id="Loginform" method="POST">
							<input type="email" placeholder="Email Address" name="email" />
							<input type="password" placeholder="Password" name="password" />
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
							<input type="hidden" name="Loginform">

							<button type="submit" value="submit" class="btn btn-default">Login</button>
						</form>
					</div>
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>New User Signup!</h2>
						<form id="signupform" method="POST">
							<input type="text" name="fname" placeholder="First Name" />
							<input type="text" name="lname" placeholder="Last Name" />
							<input type="email" placeholder="Email Address" name="email" />
							<input type="number" name="pn" placeholder="Phone" />
							<input type="password" name="password" placeholder="Password" />
							<input type="hidden" name="signupform">
							<button type="submit" value="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ???s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i
										class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright ?? 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank"
								href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>

	</footer>
	<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
<script>
	$('#Loginform').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: 'core/actions.php',
			type: 'POST',
			data: $('#Loginform').serialize(),
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
						location.replace('../index.php');
					}, 2000);
				}
			}
		})
	})
	$('#signupform').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: 'core/actions.php',
			type: 'POST',
			data: $('#signupform').serialize(),
			success: function (val) {
				console.log(val);
				if (val == "0") {
					$('#alertdanger1').fadeIn();
				} else {
					$("#alertSuccess1").fadeIn();
					document.getElementById('signupform');
					setTimeout(() => {
						location.replace('../index.php');
					}, 2000);
				}
			}
		})
	})
</script>