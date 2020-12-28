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
	<title>Activities - HRMS admin template</title>
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
			<!-- Page Content -->
			<div class="content">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Activities</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Activities</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12">
						<div class="activity">
							<div class="activity-box">
								<ul class="activity-list">
									<li>
										<div class="activity-user">
											<a href="profile.html" title="Lesley Grauer" data-toggle="tooltip" class="avatar">
												<img src="assets/img/profiles/avatar-01.jpg" alt="">
											</a>
										</div>
										<div class="activity-content">
											<div class="timeline-content">
												<a href="profile.html" class="name">Lesley Grauer</a> added new task <a href="#">Hospital Administration</a>
												<span class="time">4 mins ago</span>
											</div>
										</div>
									</li>
									<li>
										<div class="activity-user">
											<a href="profile.html" class="avatar" title="Jeffery Lalor" data-toggle="tooltip">
												<img src="assets/img/profiles/avatar-16.jpg" alt="">
											</a>
										</div>
										<div class="activity-content">
											<div class="timeline-content">
												<a href="profile.html" class="name">Jeffery Lalor</a> added <a href="profile.html" class="name">Loren Gatlin</a> and <a href="profile.html" class="name">Tarah Shropshire</a> to project <a href="#">Patient appointment booking</a>
												<span class="time">6 mins ago</span>
											</div>
										</div>
									</li>
									<li>
										<div class="activity-user">
											<a href="profile.html" title="Catherine Manseau" data-toggle="tooltip" class="avatar">
												<img src="assets/img/profiles/avatar-08.jpg" alt="">
											</a>
										</div>
										<div class="activity-content">
											<div class="timeline-content">
												<a href="profile.html" class="name">Catherine Manseau</a> completed task <a href="#">Appointment booking with payment gateway</a>
												<span class="time">12 mins ago</span>
											</div>
										</div>
									</li>
									<li>
										<div class="activity-user">
											<a href="#" title="Bernardo Galaviz" data-toggle="tooltip" class="avatar">
												<img src="assets/img/profiles/avatar-13.jpg" alt="">
											</a>
										</div>
										<div class="activity-content">
											<div class="timeline-content">
												<a href="profile.html" class="name">Bernardo Galaviz</a> changed the task name <a href="#">Doctor available module</a>
												<span class="time">1 day ago</span>
											</div>
										</div>
									</li>
									<li>
										<div class="activity-user">
											<a href="profile.html" title="Mike Litorus" data-toggle="tooltip" class="avatar">
												<img src="assets/img/profiles/avatar-05.jpg" alt="">
											</a>
										</div>
										<div class="activity-content">
											<div class="timeline-content">
												<a href="profile.html" class="name">Mike Litorus</a> added new task <a href="#">Patient and Doctor video conferencing</a>
												<span class="time">2 days ago</span>
											</div>
										</div>
									</li>
									<li>
										<div class="activity-user">
											<a href="profile.html" title="Jeffery Lalor" data-toggle="tooltip" class="avatar">
												<img src="assets/img/profiles/avatar-16.jpg" alt="">
											</a>
										</div>
										<div class="activity-content">
											<div class="timeline-content">
												<a href="profile.html" class="name">Jeffery Lalor</a> added <a href="profile.html" class="name">Jeffrey Warden</a> and <a href="profile.html" class="name">Bernardo Galaviz</a> to the task of <a href="#">Private chat module</a>
												<span class="time">7 days ago</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
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