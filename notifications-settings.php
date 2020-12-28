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
	<title>Notifications Settings - HRMS admin template</title>
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
		include_once 'includes/settings-sidebar.php';
		// <!-- /Sidebar -->
		?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Notifications Settings</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						<div>
							<ul class="list-group notification-list">
								<li class="list-group-item">
									Employee
									<div class="status-toggle">
										<input type="checkbox" id="staff_module" class="check">
										<label for="staff_module" class="checktoggle">checkbox</label>
									</div>
								</li>
								<li class="list-group-item">
									Holidays
									<div class="status-toggle">
										<input type="checkbox" id="holidays_module" class="check" checked="">
										<label for="holidays_module" class="checktoggle">checkbox</label>
									</div>
								</li>
								<li class="list-group-item">
									Leaves
									<div class="status-toggle">
										<input type="checkbox" id="leave_module" class="check" checked="">
										<label for="leave_module" class="checktoggle">checkbox</label>
									</div>
								</li>
								<li class="list-group-item">
									Events
									<div class="status-toggle">
										<input type="checkbox" id="events_module" class="check" checked="">
										<label for="events_module" class="checktoggle">checkbox</label>
									</div>
								</li>
								<li class="list-group-item">
									Chat
									<div class="status-toggle">
										<input type="checkbox" id="chat_module" class="check" checked="">
										<label for="chat_module" class="checktoggle">checkbox</label>
									</div>
								</li>
								<li class="list-group-item">
									Jobs
									<div class="status-toggle">
										<input type="checkbox" id="job_module" class="check">
										<label for="job_module" class="checktoggle">checkbox</label>
									</div>
								</li>
							</ul>
						</div>
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
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>
</html>