<?php
require_once 'includes/library.php';
session_start();
$app = new AppLib();
$is_login = $app->is_user();
if (!$is_login) {
	header('location:login.php');
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
	<title>Jobs - HaRaM</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
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
		// <!-- /Sidebar -->

		?>
		<!-- Page Wrapper -->
		<div class="page-wrapper job-wrapper">
			<!-- Page Content -->
			<div class="content container">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Jobs</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Jobs</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Web Devloper</h3>
									<h4 class="job-department">Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Full Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Android Devloper</h3>
									<h4 class="job-department">App Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Part Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Web Devloper</h3>
									<h4 class="job-department">Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Full Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Android Devloper</h3>
									<h4 class="job-department">App Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Part Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Web Devloper</h3>
									<h4 class="job-department">Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Full Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Android Devloper</h3>
									<h4 class="job-department">App Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Part Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Web Devloper</h3>
									<h4 class="job-department">Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Full Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="job-list" href="job-view.php">
							<div class="job-list-det">
								<div class="job-list-desc">
									<h3 class="job-list-title">Android Devloper</h3>
									<h4 class="job-department">App Development</h4>
								</div>
								<div class="job-type-info">
									<span class="job-types">Part Time</span>
								</div>
							</div>
							<div class="job-list-footer">
								<ul>
									<li><i class="fa fa-map-signs"></i> California</li>
									<li><i class="fa fa-money"></i> $35000-$38000</li>
									<li><i class="fa fa-clock-o"></i> 2 days ago</li>
								</ul>
							</div>
						</a>
					</div>
				</div>
			</div>
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
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>

</html>