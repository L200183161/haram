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
	<title>Profile - HaRaM</title>
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
						<div class="col">
							<h3 class="page-title">Profile</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Profile</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<!-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_plan"><i class="fa fa-plus"></i> Add Subscription</a> -->
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<!-- Plan Tab -->
						<div class="row justify-content-center mb-4">
							<div class="col-auto">
								<nav class="nav btn-group">
									<!-- <button href="#monthly" class="btn btn-outline-secondary active show" data-toggle="tab">Monthly Plan</button> -->
								</nav>
							</div>
						</div>
						<!-- /Plan Tab -->
						<!-- Plan Tab Content -->
						<div class="tab-content">
							<!-- Monthly Tab -->
							<div class="tab-pane fade active show" id="monthly">
								<div class="row mb-30 equal-height-cards">

									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>Donny Rizal</h3>
													<h5>Adhi Pratama</h5>
													<img src="https://scontent.fcgk8-2.fna.fbcdn.net/v/t1.0-9/69846702_3119501794756454_4605255348578680832_o.jpg?_nc_cat=107&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeEVFfozSSCcqNpVXlEn0_pGj0q07mAnazGPSrTuYCdrMZ_wYZwqq3IIsMc-p2HLGFr5GgPvAkfaxZFMElCWBoeH&_nc_ohc=QGzKn7acxqsAX_92eAz&_nc_ht=scontent.fcgk8-2.fna&oh=e59aec8d7bb5ce79d39a60a56c323eb3&oe=60107543" class="img-thumbnail display-4" aria-placeholder="gambar"></img>
												</div>
												<ul>
													<li><i class="fa fa-circle"></i> <b>L200183161</b></li>
													<li><i class="fa fa-circle"></i>Backend</li>
													<li><i class="fa fa-circle"></i>Frontend</li>
													<li><i class="fa fa-circle"></i>Documentation</li>
													<li style="display:none;"><i class="fa fa-circle"></i>karepmu le, kon ewaki raiso wes tak garap aku kabeh kowe ra sah ntuk nilai ya</li>
												</ul>
												<!-- <a href="#" class="btn btn-lg btn-secondary mt-auto" data-toggle="modal" data-target="#edit_plan">Edit</a> -->
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>M. Faqih</h3>
													<h5>Eza Ammar</h5>
													<img src="https://scontent.fcgk9-2.fna.fbcdn.net/v/t1.0-9/67471992_2431989803560535_4023364550727303168_o.jpg?_nc_cat=101&ccb=2&_nc_sid=8bfeb9&_nc_eui2=AeEMlx1n5cBSdUhHOlu5GhRNMrBcO99FANgysFw730UA2LI2z912-gKTeB-YuWekDbhwuZmgWRnBn1KM1lTLIBnF&_nc_ohc=iw9BA7FjZ4AAX9jztQL&_nc_ht=scontent.fcgk9-2.fna&oh=8fe911280a5c40ea24096ca112f3399b&oe=600FCFB3" class="img-thumbnail display-4" aria-placeholder="gambar"></img>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>1 User</b></li>
													<li><i class="fa fa-check"></i> 5 Projects </li>
													<li><i class="fa fa-check"></i> 5 GB Storage</li>
													<li><i class="fa fa-check"></i> Unlimited Message</li>
												</ul>
												<!-- <a href="#" class="btn btn-lg btn-secondary mt-auto" data-toggle="modal" data-target="#edit_plan">Edit</a> -->
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>M. Rifqy</h3>
													<h5>Fauzy</h5>
													<img src="https://scontent.fcgk8-1.fna.fbcdn.net/v/t1.0-9/128905106_197069311952501_2945952198504829428_n.jpg?_nc_cat=111&ccb=2&_nc_sid=174925&_nc_eui2=AeGjsMne5swHBVkVAhWu86eSBF7NxD1rl04EXs3EPWuXTuBWJnoIypbrPSjSZunjmY5HVMCPs-clndlqKU9DOzxd&_nc_ohc=XKHNZn8FEH0AX_VnDTr&_nc_ht=scontent.fcgk8-1.fna&oh=0ea6062982157be8bf7c27a847e9a501&oe=6012A321" class="img-thumbnail display-4" aria-placeholder="gambar"></img>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>1 User</b></li>
													<li><i class="fa fa-check"></i> 5 Projects </li>
													<li><i class="fa fa-check"></i> 5 GB Storage</li>
													<li><i class="fa fa-check"></i> Unlimited Message</li>
												</ul>
												<!-- <a href="#" class="btn btn-lg btn-secondary mt-auto" data-toggle="modal" data-target="#edit_plan">Edit</a> -->
											</div>
										</div>
									</div>




								</div>
							</div>
							<!-- /Monthly Tab -->
						</div>
						<!-- /Plan Tab Content -->
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