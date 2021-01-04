<?php
require_once 'includes/library.php';
session_start();
$app = new AppLib();
$is_login = $app->is_user();
$dbh = Database();
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
	<title>Departments - HaRaM</title>
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
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Department</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Department</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12">
						<div>
							<table class="table table-striped custom-table mb-0 dataTable">
								<thead>
									<tr>
										<th style="width: 30px;">#</th>
										<th>Department Name</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM departments";
									$results2 = $dbh->query($sql);
									$cnt = 1;
									if ($results2->rowCount() > 0) {
										foreach ($results2 as $row) {
									?>
											<tr>
												<td><?php echo htmlentities($cnt++); ?></td>
												</td>
												<td><?php echo htmlentities($row['Department']); ?></td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="javascript:void(0)" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="javascript:void(0)" id="edit_deptButton" data-id="<?php echo htmlentities($row['id']) ?>" data-department="<?php echo htmlentities($row['Department']) ?>" data-toggle="modal" data-target="#edit_department"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<!-- Jikalau memakai ->query() tolong ati2 dengan apostrhorp awal dan akhir '' -->
															<a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('departments.php?&delid=<?= htmlentities($row['id']); ?>');" data-id="<?php echo htmlentities($row['id']); ?>" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
									<?php
										}
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
			<!-- Add Department Start -->
			<?php
			if (isset($_POST['add_department'])) {
				$department = htmlspecialchars($_POST['department_name']);
				$sql = "INSERT INTO `departments`(`id`,`Department`,`Date`) VALUES (NULL, :department_name, default)";
				$query = $dbh->prepare($sql);
				$query->bindParam(':department_name', $department, PDO::PARAM_STR);
				$query->execute();
				$lastinserted = $dbh->lastInsertId();
				if ($lastinserted > 0) {
					echo "<script>alert('Departments Succesfully added');</script>";
					echo "<script>window.location.href='departments.php';</script>";
				} else {
					echo "<script>alert('Something Went Wrong Please Again.');</script>";
				}
			}

			//adding dept ends
			?>


			<!-- Add Department Modal -->

			<div id="add_department" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Department</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Department Name <span class="text-danger">*</span></label>
									<input name="department_name" class="form-control" type="text">
								</div>
								<div class="submit-section">
									<button type="submit" name="add_department" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Department Modal -->
			<!-- Edit Department Modal -->
			<?php
			if (isset($_POST['edit_department'])) {
				echo "<script>alert('data berhasil di update');document.location.href='departments.php';</script>";
				global $dbh;
				$id = htmlspecialchars($_POST['id']);
				$department = htmlspecialchars($_POST['department_name']);
				$sql = "UPDATE `departments`SET `id`=:id, `Department`=:department_name where `id`=:id";
				$query = $dbh->prepare($sql);
				$query->bindParam(':department_name', $department, PDO::PARAM_STR);
				$query->bindParam(':id', $id, PDO::PARAM_STR);
				$query->execute();
				return $query->rowCount();
			} ?>
			<div id="edit_department" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Department</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label hidden for="id">id<span class="text-danger">*</span></label>
									<input hidden name="id" id="id" class="form-control" value="" type="text">
								</div>
								<div class="form-group">
									<label for="department_name">Department Name <span class="text-danger">*</span></label>
									<input name="department_name" id="department_name" class="form-control" value="" type="text">
								</div>
								<div class="submit-section">
									<button type="submit" name="edit_department" class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Department Modal -->
			<!-- Delete Department Modal -->
			<?php
			if (isset($_GET['delid'])) {
				$rid = intval($_GET['delid']);
				$sql = "DELETE from departments where id=:rid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':rid', $rid, PDO::PARAM_STR);
				$query->execute();
				echo "<script>
					alert('Data as deleted);
					window.location.href = 'departments.php';
					</script>";
				echo "<script>
					alert('Data can't be deleted');
					window.location.href = 'departments.php'
					</script>";
			} ?>
			<div class="modal custom-modal fade" id="delete_department" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Department</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0);" class="btn btn-primary continue-btn" id="link_hapus">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Department Modal -->
		</div>
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

	<script>
		$(document).on("click", "#edit_deptButton", function() {
			let id = $(this).data('id');
			let Department = $(this).data('department');

			$(".modal-body #id").val(id);
			$(".modal-body #department_name").val(Department);
		});

		$(document).ready(function() {

			$('.dataTable').DataTable({
				"pagingType": "full_numbers",
				"lengthMenu": [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				responsive: true,
				language: {
					search: "_INPUT_",
					searchPlaceholder: "Search in Here",
				}
			});
		});

		function confirm_modal(delete_url) {
			$('#delete_department').modal('show', {
				backdrop: 'static'
			});
			document.getElementById('link_hapus').setAttribute('href', delete_url);
		};
	</script>
</body>

</html>