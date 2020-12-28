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
	<title>Outgoing Call - HRMS admin template</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
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
		include_once 'includes/sidebar.php';
		// <!-- /Sidebar -->
		?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Outgoing Call -->
			<div class="call-box outgoing-box">
				<div class="call-wrapper">
					<div class="call-inner">
						<div class="call-user">
							<img alt="" src="assets/img/profiles/avatar-02.jpg" class="call-avatar">
							<h4>John Doe</h4>
							<span>Connecting...</span>
						</div>
						<div class="call-items">
							<a href="javascript:void(0);" class="btn call-item"><i class="material-icons">mic</i></a>
							<a href="javascript:void(0);" class="btn call-item"><i class="material-icons">videocam</i></a>
							<a href="chat.php" class="btn call-item call-end"><i class="material-icons vcend">call_end</i></a>
							<a href="javascript:void(0);" class="btn call-item"><i class="material-icons">person_add</i></a>
							<a href="javascript:void(0);" class="btn call-item"><i class="material-icons">volume_up</i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- Outgoing Call -->
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
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>
</html>