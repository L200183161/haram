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
	<title>Knowledgebase - HaRaM</title>
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
		include_once 'includes/header.php';
		// <!-- /Header -->
		// <!-- Sidebar -->
		include_once 'includes/sidebar.php';
		// <!-- /Sidebar -->
		?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Knowledgebase</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Knowledgebase</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Installation & Activation <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Premium Members Features <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> API Usage & Guide lines <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Getting Started <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Lorem ipsum dolor <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Lorem ipsum dolor <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Lorem ipsum dolor <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Lorem ipsum dolor <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-sm-6 ">
						<div class="topics">
							<h3 class="topic-title"><a href="#"><i class="fa fa-folder-o"></i> Lorem ipsum dolor <span>11</span></a></h3>
							<ul class="topics-list">
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
								</li>
								<li><a href="knowledgebase-view.php"> Sed ut perspiciatis unde omnis? </a>
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