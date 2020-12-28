<?php
	require_once 'includes/library.php';
	session_start();
	$app = new AppLib();
	$is_login = $app->is_user();
	if (!$is_login) {
		redirect('login.php');
	}if (isset($_POST['submit'])) {
		$name = htmlspecialchars($_POST['company']);
		$address = htmlspecialchars($_POST['address']);
		$country = htmlspecialchars($_POST['country']);
		$postal_code = htmlspecialchars($_POST['postal_code']);
		$email = htmlspecialchars($_POST['email']);
		$phone = htmlspecialchars($_POST['phone']);
		$app->set_company($name,$address,$country,$postal_code,$email,$phone);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Settings - HRMS admin template</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<!-- Header -->
		<?php  
		// <!-- Header -->
		include_once 'includes/header.php';
		// <!-- /Header -->
		// <!-- Sidebar -->
		include_once 'includes/settings-sidebar.php';
		// <!-- /Sidebar -->
		?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Company Settings</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						<form method="POST">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Company Name</label>
										<input name="company" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Address</label>
										<input class="form-control " name="address">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>Country</label>
										<select name="country" class="form-control select">
											<option>USA</option>
											<option>United Kingdom</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>Postal Code</label>
										<input class="form-control" name="postal_code" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" name="email" type="email">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Phone Number</label>
										<input class="form-control" name="phone" type="text">
									</div>
								</div>
							</div>
							
							<div class="submit-section">
								<button type="submit" name="submit" class="btn btn-primary submit-btn">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
		</div>
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>

</html>