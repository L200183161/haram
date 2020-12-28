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
	<title>Knowledgebase - HRMS admin template</title>
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
				<!-- Content Starts -->
				<div class="row">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<article class="post">
									<h1 class="post-title">Lorem ipsum dolor sit amet </h1>
									<ul class="meta">
										<li><span>Created :</span> Feb, 04, 2016</li>
										<li><span>Category:</span> <a href="#">Category 1</a>, <a href="#">Category 2</a></li>
										<li><span>Last Updated:</span> April, 15, 2016</li>
										<li><span>Comments :</span> <a href="#">5</a></li>
										<li><span>Views :</span> 1198</li>
									</ul>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
									</p>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
									</p>
									<h2>Sed ut perspiciatis unde omnis iste</h2>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
									</p>
									<h2>Sed ut perspiciatis unde omnis iste</h2>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
									</p>
								</article>
								<div class="feedback">
									<h3>Was this article helpful to you?</h3>
									<p>
										<a href="#" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
										<a href="#" class="btn btn-danger"><i class="fa fa-thumbs-down"></i></a>
									</p>
									<p>29 found this helpful</p>
								</div>
								<div class="comment-section">
									<div class="comments-area clearfix">
										<h3>( 2 ) Comments</h3>
										<ul class="comment-list">
											<li>
												<div class="comment">
													<div class="comment-author">
														<img width="86" height="86" class="avatar avatar-86 photo" src="assets/img/user.jpg" alt="">
													</div>
													<div class="comment-details">
														<div class="author-name">
															<a class="url" href="#">John Doe</a> <span class="commentmetadata">October 25, 2016 at 01:10 pm</span>
														</div>
														<div class="comment-body">
															<p>Integer id dolor libero. Cras in turpis nulla. Vivamus at tellus erat. Nulla ligula sem, eleifend vitae semper et, blandit a elit. Nam et ultrices lectus. Ut sit amet risus eget neque scelerisque consectetur.</p>
														</div>
														<div class="reply"><a href="#" class="comment-reply-link" rel="nofollow"><i class="fa fa-reply"></i> Reply</a></div>
													</div>
												</div>
												<ul class="children">
													<li>
														<div class="comment">
															<div class="comment-author">
																<img width="86" height="86" class="avatar avatar-86 photo" src="assets/img/user.jpg" alt="">
															</div>
															<div class="comment-details">
																<div class="author-name">
																	<a href="#" class="comment-reply-link"></a><a class="url" href="#">Astin Robert</a> <span class="commentmetadata">October 25, 2016 at 01:10 pm</span>
																</div>
																<div class="comment-body">
																	<p>Mauris hendrerit consequat quam, sit amet fermentum metus cursus in. Nunc ac justo suscipit erat sagittis maximus a at tellus. Pellentesque congue nisi a nisl volutpat tempor.</p>
																</div>
																<div class="reply"><a href="#" class="comment-reply-link"><i class="fa fa-reply"></i> Reply</a></div>
															</div>
														</div>
													</li>
												</ul>
											</li>
										</ul>
										<div class="comment-reply">
											<h3 class="comment-reply-title">Leave a Reply</h3>
											<form>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="name">Name</label>
															<input type="text" id="name" name="name" class="form-control">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="email">Email</label>
															<input type="email" id="email" name="email" class="form-control">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="website">Website</label>
															<input type="text" id="website" name="website" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="comment">Comment *</label>
													<textarea id="comment" name="comment" class="form-control" rows="3" cols="5"></textarea>
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Post Comment</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="w-sidebar">
							<div class="widget widget-category">
								<h4 class="widget-title"><i class="fa fa-folder-o"></i> Categories</h4>
								<ul>
									<li>
										<a href="#">Categories 1</a>
									</li>
									<li>
										<a href="#">Categories 2</a>
									</li>
									<li>
										<a href="#">Categories 3</a>
									</li>
									<li>
										<a href="#">Categories 4</a>
									</li>
									<li>
										<a href="#">Categories 5</a>
									</li>
								</ul>
							</div>
							<div class="widget widget-category">
								<h4 class="widget-title"><i class="fa fa-folder-o"></i> Popular Articles</h4>
								<ul>
									<li><a href="#"> Installation &amp; Activation </a></li>
									<li><a href="#"> Premium Members Features </a></li>
									<li><a href="#"> API Usage &amp; Guide lines </a></li>
									<li><a href="#"> Getting Started &amp; What is next. </a></li>
									<li><a href="#"> Installation &amp; Activation </a></li>
									<li><a href="#"> Premium Members Features </a></li>
									<li><a href="#"> API Usage &amp; Guide lines </a></li>
									<li><a href="#"> Getting Started &amp; What is next. </a></li>
								</ul>
							</div>
							<div class="widget widget-category">
								<h4 class="widget-title"><i class="fa fa-folder-o"></i> Latest Articles</h4>
								<ul>
									<li><a href="#"> Installation &amp; Activation </a></li>
									<li><a href="#"> Premium Members Features </a></li>
									<li><a href="#"> API Usage &amp; Guide lines </a></li>
									<li><a href="#"> Getting Started &amp; What is next. </a></li>
									<li><a href="#"> Installation &amp; Activation </a></li>
									<li><a href="#"> Premium Members Features </a></li>
									<li><a href="#"> API Usage &amp; Guide lines </a></li>
									<li><a href="#"> Getting Started &amp; What is next. </a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /Content End -->
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