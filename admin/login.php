<?php include '../core/dbconfig.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Garments | Login Page</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link href="../admin/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../admin/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="../admin/assets/demo/default/media/img/logo/favicon.ico" />
</head>

<body
	class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<p class="alert alert-success alert-dismissible" id="alertSuccess1" style="display: none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Login Successfully!
		</p>
		<p class="alert alert-danger alert-dismissible" id="alertFailed1" style="display: none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Something went wrong, try again later.
		</p>
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin"
			id="m_login">
			<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
				<div class="m-stack m-stack--hor m-stack--desktop">
					<div class="m-stack__item m-stack__item--fluid">
						<div class="m-login__wrapper">
							<div class="m-login__logo">
								<a href="#">
									<img src="../admin/assets/app/media/img/logos/logo-2.png">
								</a>
							</div>
							<div class="m-login__signin">
								<div class="m-login__head">
									<h3 class="m-login__title">LogIn To Admin</h3>
								</div>
								<form class="m-login__form m-form" id="adminForm">
									<div class="form-group m-form__group">
										<input class="form-control m-input" type="text" placeholder="Email" name="email"
											required>
									</div>
									<div class="form-group m-form__group">
										<input class="form-control m-input m-login__form-input--last" type="password"
											placeholder="Password" name="password" required>
									</div>
									<div class="row m-login__form-sub">
										<div class="col m--align-left">
											<label class="m-checkbox m-checkbox--focus">
												<input type="checkbox" name="remember"> Remember me
												<span></span>
											</label>
										</div>
										<div class="col m--align-right">
											<a href="javascript:;" id="m_login_forget_password" class="m-link">Forget
												Password ?</a>
										</div>
									</div>
									<input type="hidden" name="login">
									<input type="submit" class="btn"
										style="background-color:purple;color:white;border-radius:25px;padding-left:20px;padding-right:25px;margin-left:140px;margin-top:40px;"
										value="Log In">
								</form>
							</div>
							<div class="m-login__signup">

							</div>
							<div class="m-login__forget-password">

							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center"
				style="background-image: url(../admin/assets/app/media/img//bg/bg-4.jpg)">
				<div class="m-grid__item">
					<h3 class="m-login__welcome">Join Our Community</h3>
					<h1 style="color:white;">
						Garments
					</h1>
				</div>
			</div>
		</div>
	</div>
	<script src="../admin/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="../admin/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
	<script src="../admin/assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
</body>

</html>
<script>
	$(function () {
		$('#adminForm').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				url: 'core/actions.php',
				type: 'POST',
				data: $('#adminForm').serialize(),
				success: function (val) {
					console.log(val);
					if (val == "1") {
						$('#alertSuccess1').fadeIn(2000);
						$('#alertSuccess1').fadeOut(3000);
						setTimeout(() => {
							location.replace('index.php');
						}, 2000);
					} else {
						$('#alertFailed1').fadeIn(2000);
						$('#alertFailed1').fadeOut(3000);
					}
				}
			})
		})
	});
</script>