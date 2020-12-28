<?php
	require_once 'includes/library.php';
	session_start();
	$app = new AppLib();
	$is_login = $app->is_user();
	if (!$is_login) {
		header('location:login.php');
	}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Email Settings - HRMS admin template</title>
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
		include_once 'includes/header.php';
		// <!-- /Header -->
		// <!-- Sidebar -->
			include_once 'includes/sidebar.php';
		//<!-- /Sidebar -->
			?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<form>
							<div class="form-group">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="mailoption" id="phpmail" value="option1">
									<label class="form-check-label" for="phpmail">PHP Mail</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="mailoption" id="smtpmail" value="option2">
									<label class="form-check-label" for="smtpmail">SMTP</label>
								</div>
							</div>
							<h4 class="page-title">PHP Email Settings</h4>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Email From Address</label>
										<input class="form-control" type="email">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Emails From Name</label>
										<input class="form-control" type="text">
									</div>
								</div>
							</div>
							<h4 class="page-title m-t-30">SMTP Email Settings</h4>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>SMTP HOST</label>
										<input class="form-control" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>SMTP USER</label>
										<input class="form-control" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>SMTP PASSWORD</label>
										<input class="form-control" type="password">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>SMTP PORT</label>
										<input class="form-control" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>SMTP Security</label>
										<select class="select">
											<option>None</option>
											<option>SSL</option>
											<option>TLS</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>SMTP Authentication Domain</label>
										<input class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn">Save &amp; update</button>
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