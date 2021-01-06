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
	<title>Designations - HaRaM</title>
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
							<h3 class="page-title">Designations</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Designations</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="javascript:void(0)" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 dataTable">
								<thead>
									<tr>
										<th style="width: 30px;">#</th>
										<th>Designation </th>
										<th>Department </th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM designations";
									// $query = $dbh->prepare($sql);
									// $query->execute();
									// $results = $query->fetchAll(PDO::FETCH_OBJ);
									$results2 = $dbh->query($sql);
									$cnt = 1;
									if ($results2->rowCount() > 0) {
										foreach ($results2 as $row) {
									?>
											<tr>
												<td><?php echo htmlentities($cnt++); ?></td>
												<td><?php echo htmlentities($row['Designation']); ?></td>
												<td><?php echo htmlentities($row['Department']); ?></td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="javascript:void(0)" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="javascript:void(0)" id="edit_desgButton" data-id="<?php echo htmlentities($row['id']) ?>" data-designation="<?php echo htmlentities($row['Designation']) ?>" data-department="<?php echo htmlentities($row['Department']) ?>" data-toggle="modal" data-target="#edit_designation2"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<!-- Jikalau memakai ->query() tolong ati2 dengan apostrhorp awal dan akhir '' -->
															<a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('designations.php?&delid=<?= htmlentities($row['id']); ?>');" data-id="<?php echo htmlentities($row['id']); ?>" data-toggle="modal" data-target="#delete_designation"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
			<?php
			if (isset($_POST['add_designation'])) {
				$designation = htmlspecialchars($_POST['designation_name']);
				$department = htmlspecialchars($_POST['department_name']);
				$sql = "INSERT INTO `designations`(`id`,`Designation`,`Department`,`Date`) VALUES (NULL,:designation_name, :department_name, DEFAULT)";
				$query = $dbh->prepare($sql);
				$query->bindParam(':designation_name', $designation, PDO::PARAM_STR);
				$query->bindParam(':department_name', $department, PDO::PARAM_STR);
				$query->execute();
				$lastinserted = $dbh->lastInsertId();
				if ($lastinserted > 0) {
					echo "<script>alert('Designations Succesfully added');</script>";
					echo "<script>window.location.href='designations.php';</script>";
				} else {
					echo "<script>alert('Something Went Wrong Please Again.');</script>";
				}
			}
			//adding dept ends
			?>
			<!-- Add Designation Modal -->
			<div id="add_designation" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Designation</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST">
								<div class="form-group">
									<label for="designation_name">Designation Name <span class="text-danger">*</span></label>
									<input class="form-control" name="designation_name" id="designation_name" type="text">
								</div>
								<div class="form-group">
									<label">Department <span class="text-danger">*</span></label>
										<select name="department_name" class="select">
											<?php
											$sql = "SELECT * FROM departments";
											$selection = $dbh->query($sql); //penting asuuu plisss
											// $query = $dbh->prepare($sql);
											// $query->execute();
											$selection->rowCount();
											foreach ($selection as $urut) : ?>
												<option><?= $urut['Department']; ?></option>";
											<?php endforeach ?>
										</select>
										<div class="submit-section">
											<button type="submit" name="add_designation" class="btn btn-primary submit-btn">Submit</button>
										</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Designation Modal -->
			<!-- Edit Designation Modal -->
			<div id="edit_designation2" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Designation</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST">
								<div class="form-group">
									<label for="id">ID<span class="text-danger">*</span></label>
									<input name="id" id="id" class="form-control" type="text">
								</div>
								<div class="form-group">
									<label for="designation_name">Designation Name <span class="text-danger">*</span></label>
									<input name="designation_name" id="designation_name" class="form-control" type="text">
								</div>
								<div class="form-group">
									<label for="department_name">Department <span class="text-danger">*</span></label>
									<select name="department_name" id="department_name" class="select">
										<?php
										$sql = "SELECT * FROM departments";
										$selection = $dbh->query($sql); //penting asuuu plisss
										// $query = $dbh->prepare($sql);
										// $query->execute();
										$selection->rowCount();
										foreach ($selection as $urut) : ?>
											<option><?= $urut['Department']; ?></option>";
										<?php endforeach ?>
									</select>
								</div>
								<div class="submit-section">
									<button type="submit" name="edit_designation" class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php
			if (isset($_POST['edit_designation'])) {
				// echo "<script>alert('data has been updated');document.location.href='designations.php';</script>";
				global $dbh;
				$id = htmlspecialchars($_POST['id']);
				$designation = htmlspecialchars($_POST['designation_name']);
				$department = htmlspecialchars($_POST['department_name']);
				$sql = "UPDATE `designations` SET `id`=:id, `Designation`=:designation_name, `Department`=:department_name WHERE `id`=:id";
				$query = $dbh->prepare($sql);
				$query->bindParam(':id', $id, PDO::PARAM_INT);
				$query->bindParam(':designation_name', $designation, PDO::PARAM_STR);
				$query->bindParam(':department_name', $department, PDO::PARAM_STR);
				$query->execute();
				return $query->rowCount();
				$lastinserted = $dbh->lastInsertId();
				if ($lastinserted > 0) {
					echo "<script>alert('Successfully Edited');</script>";
					echo "<script>window.location.href='designations.php';</script>";
					// header('location:index.php');
				} else {
					// echo "<script>alert('Oh crap, something is wrong'); window.location='assets.php';</script>";
					echo 'Error :';
					echo '<pre>';
					print_r($query->errorInfo());
					print_r($query->debugDumpParams());
					echo '</pre>';
				}
			}
			?>
			<!-- /Edit Designation Modal -->
			<!-- Delete Designation Modal -->
			<?php
			if (isset($_GET['delid'])) {
				$rid = intval($_GET['delid']);
				$sql = "DELETE from designations where id=:rid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':rid', $rid, PDO::PARAM_STR);
				$query->execute();
				echo "<script>
					alert('Data has deleted);
					window.location.href = 'designations.php';
					</script>";
				echo "<script>
					alert('Data can't be deleted');
					window.location.href = 'designations.php'
					</script>";
			} ?>

			<div class="modal custom-modal fade" id="delete_designation" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Designation</h3>
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
			<!-- /Delete Designation Modal -->
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
	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
	<script>
		$(document).on("click", "#edit_desgButton", function() {
			let id = $(this).data('id');
			let Designation = $(this).data('designation');
			let Department = $(this).data('department');

			$(".modal-body #id").val(id);
			$(".modal-body #designation_name").val(Designation);
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
			$('#delete_designation').modal('show', {
				backdrop: 'static'
			});
			document.getElementById('link_hapus').setAttribute('href', delete_url);
		};
	</script>
</body>

</html>