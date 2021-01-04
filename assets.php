<?php
require_once 'includes/library.php';
session_start();
ERROR_REPORTING(E_ALL);
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
	<title>Assets - HaRaM</title>
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
	<script>
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
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
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Assets</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Assets</li>
							</ul>
						</div>

						<div class="col-auto float-right ml-auto">
							<a href="javascript:void(0)" class="btn add-btn" data-toggle="modal" data-target="#add_asset"><i class="fa fa-plus"></i> Add Asset</a>

						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<a href="javascript:void(0)" class="btn btn-file" onclick="printDiv('print')"><i class="fa fa-print"></i> Print</a>
				<div class="row" id="print">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 dataTable js-exportable">
								<thead>
									<tr>
										<th class="text-left">Number</th>
										<th class="text-left">Asset User</th>
										<th class="text-left">Product Name</th>
										<th class="text-left">Product ID</th>
										<th class="text-left">Purchase Date</th>
										<th class="text-left">Warrenty</th>
										<th class="text-left">Amount</th>
										<th class="text-center">Status</th>
										<th class="text-danger text-right">Setting</th>
									</tr>
								</thead>
								<tbody>
									<!--Sempak kw cuman butuh body di luar-->
									<!-- code to show the table -->

									<?php
									$sql = "SELECT * FROM assets";
									// $query = $dbh->prepare($sql);
									// $query->execute();
									// $results = $query->fetchAll(PDO::FETCH_OBJ);
									$results2 = $dbh->query($sql);
									$cnt = 1;
									if ($results2->rowCount() > 0) {
										foreach ($results2 as $row) {
											$newdate = date("l d-m-Y", strtotime($row['PurchaseDate'])); //Convert to d/m/Y
									?>

											<tr>
												<td><?php echo htmlentities($cnt++); ?></td>
												<td><?php echo htmlentities($row['AssetUser']); ?></td>
												<td>
													<strong><?php echo htmlentities($row['assetName']); ?></strong>
												</td>
												<td><?php echo htmlentities($row['assetId']); ?></td>
												<td><?php echo htmlentities($newdate); ?></td>
												<td><?php echo htmlentities($row['Warranty']), " Months"; ?></td>
												<td><?php echo "Rp " . number_format((htmlentities($row['Price'])), 2, ',', '.'); ?></td>
												<td class="text-center">
													<?php
													if ($row['Status'] == 0) {
														echo '<a ><i class="fa fa-dot-circle-o text-info"></i> Pending</a>';
													} elseif ($row['Status'] == 1) {
														echo '<a ><i class="fa fa-dot-circle-o text-muted "></i> Approved</a>';
													} elseif ($row['Status'] == 2) {
														echo '<a ><i class="fa fa-dot-circle-o text-success"></i> Deployed</a>';
													} elseif ($row['Status'] == 3) {
														echo '<a ><i class="fa fa-dot-circle-o text-danger"></i> Damaged</a>';
													} ?>
												</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="javascript:void(0)" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="javascript:void(0)" id="edit_assetButton" data-id="<?php echo htmlentities($row['id']) ?>" data-assetid="<?php echo htmlentities($row['assetId']) ?>" data-name="<?php echo htmlentities($row['assetName']) ?>" data-date="<?php echo htmlentities($row['PurchaseDate']) ?>" data-from="<?php echo htmlentities($row['PurchaseFrom']) ?>" data-manufacturer="<?php echo htmlentities($row['Manufacturer']) ?>" data-mod="<?php echo htmlentities($row['Model']) ?>" data-status="<?php echo htmlentities($row['Status']) ?>" data-supplier="<?php echo htmlentities($row['Supplier']) ?>" data-assetcondition="<?php echo htmlentities($row['AssetCondition']) ?>" data-warranty="<?php echo htmlentities($row['Warranty']) ?>" data-price="<?php echo htmlentities($row['Price']) ?>" data-assetuser="<?php echo htmlentities($row['AssetUser']) ?>" data-description="<?php echo htmlentities($row['Description']) ?>" data-toggle="modal" data-target="#edit_asset"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<!-- Jikalau memakai ->query() tolong ati2 dengan apostrhorp awal dan akhir '' -->
															<a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('assets.php?&delid=<?= htmlentities($row['id']); ?>');" data-id="<?php echo htmlentities($row['id']); ?>" data-toggle="modal" data-target="#delete_asset"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
			<!-- Add Asset Modal -->
			<?php
			// adding assets begins here
			if (isset($_POST['add_asset'])) {
				$asset = htmlspecialchars($_POST['asset_name']);
				$asset_id = htmlspecialchars($_POST['asset_id']);
				$purchase_date = htmlspecialchars($_POST['purchase_date']);
				$purchase_from = htmlspecialchars($_POST['purchase_from']);
				$manufacturer = htmlspecialchars($_POST['manufacturer']);
				$model = htmlspecialchars($_POST['model']);
				$status = htmlspecialchars($_POST['status']);
				$supplier = htmlspecialchars($_POST['supplier']);
				$condition = htmlspecialchars($_POST['condition']);
				$warrant = htmlspecialchars($_POST['warranty']);
				$price = htmlspecialchars($_POST['value']);
				$asset_user = htmlspecialchars($_POST['asset_user']);
				$description = htmlspecialchars($_POST['description']);
				$sql = "INSERT INTO `assets` ( `assetName`, `assetId`, `PurchaseDate`, `PurchaseFrom`, `Manufacturer`, `Model`, `Status`, `Supplier`, `AssetCondition`, `Warranty`, `Price`, `AssetUser`, `Description`)
				VALUES (:name, :id, :purchaseDate, :purchasefrom, :manufacturer, :model, :stats, :supplier, :condition, :warranty, :price, :user, :describe)";
				$query = $dbh->prepare($sql);
				$query->bindParam(':name', $asset, PDO::PARAM_STR);
				$query->bindParam(':id', $asset_id, PDO::PARAM_STR);
				$query->bindParam(':purchaseDate', $purchase_date, PDO::PARAM_STR);
				$query->bindParam(':purchasefrom', $purchase_from, PDO::PARAM_STR);
				$query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
				$query->bindParam(':model', $model, PDO::PARAM_STR);
				$query->bindParam(':stats', $status, PDO::PARAM_INT);
				$query->bindParam(':supplier', $supplier, PDO::PARAM_STR);
				$query->bindParam(':condition', $condition, PDO::PARAM_STR);
				$query->bindParam(':warranty', $warrant, PDO::PARAM_INT);
				$query->bindParam(':price', $price, PDO::PARAM_INT);
				$query->bindParam(':user', $asset_user, PDO::PARAM_STR);
				$query->bindParam(':describe', $description, PDO::PARAM_STR);
				$query->execute();
				$lastinserted = $dbh->lastInsertId();
				if ($lastinserted > 0) {
					echo "<script>alert('Asset Succesfully added');</script>";
					echo "<script>window.location.href='assets.php';</script>";
				} else {
					echo "<script>alert('Something Went Wrong Please Again.');</script>";
				}
			}
			//adding assets code ends here.
			$set = '1234567890';
			$id = substr(str_shuffle($set), 0, 6); ?>
			<div id="add_asset" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Asset</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Product Name</label>
											<input name="asset_name" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Product ID</label>
											<input readonly name="asset_id" value="<?php echo '#AST-' . $id; ?>" class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchase Date</label>
											<input name="purchase_date" id="purchase_date" class="form-control" type="date">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Purchase From</label>
											<input name="purchase_from" class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Manufacturer</label>
											<input name="manufacturer" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Model</label>
											<input name="model" class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select name="status" class="select">
												<option value="0">Pending</option>
												<option value="1">Approved</option>
												<option value="2">Deployed</option>
												<option value="3">Damaged</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Supplier</label>
											<input name="supplier" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Condition</label>
											<input name="condition" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Warranty</label>
											<input name="warranty" class="form-control" type="text" placeholder="In Months">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Value/Price</label>
											<input placeholder="Price" name="value" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Asset User</label>
											<!-- Nanti dikasih selection ya don pake employees select  cek yg praktikum gudang dulu buat query-> -->
											<select name="asset_user" class="select">
												<?php
												$sql = "SELECT * FROM employees";
												$selection = $dbh->query($sql); //penting asuuu plisss
												// $query = $dbh->prepare($sql);
												// $query->execute();
												$selection->rowCount();
												foreach ($selection as $urut) : ?>
													<option>
														<?= $urut['FirstName'] . " " . $urut['LastName'] ?></option>";
												<?php endforeach ?>
												<!-- <option>John Doe</option>
												<option>Richard Miles</option> -->
												<!-- Yeyyy berhasilll noicee -->
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
											<textarea name="description" class="form-control"></textarea>
										</div>
									</div>

								</div>
								<div class="submit-section">
									<button type="submit" name="add_asset" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Asset Modal -->
			<!-- Edit Asset Modal -->

			<div id="edit_asset" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Asset</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label hidden for="id">ID</label>
											<input hidden name="id" id="id" class="form-control" type="text">
										</div>
										<div class="form-group">
											<label for="asset_name">Product Name</label>
											<input name="asset_name" id="asset_name" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="asset_id">Product ID</label>
											<input readonly name="asset_id" id="asset_id" value="<?php echo '#AST-' . $id; ?>" class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="purchase_date">Purchase Date</label>
											<input name="purchase_date" id="purchase_date" value="<?php echo date('dd/mm/yy'); ?>" class="form-control" type="date">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="purchase_from">Purchase From</label>
											<input name="purchase_from" id="purchase_from" class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="manufacturer">Manufacturer</label>
											<input name="manufacturer" id="manufacturer" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="model">Model</label>
											<input name="model" id="model" class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="status">Status</label>
											<select name="status" id="status" class="select">
												<option value="0">Pending</option>
												<option value="1">Approved</option>
												<option value="2">Deployed</option>
												<option value="3">Damaged</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="supplier">Supplier</label>
											<input name="supplier" id="supplier" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="condition">Condition</label>
											<input name="condition" id="condition" class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="warranty">Warranty</label>
											<input name="warranty" id="warranty" class="form-control" type="text" placeholder="In Months">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="value">Value/Price</label>
											<input placeholder="Rp. 180.000" name="value" id="value" class="form-control" type="text">
										</div>
									</div>
									<!-- Nanti dikasih selection ya don pake employees select  cek yg praktikum gudang dulu buat query-> -->
									<div class="col-md-6">
										<div class="form-group">
											<label for="user">Asset User</label>
											<select name="user" id="user" class="select">
												<?php
												$sql = "SELECT * FROM employees";
												$selection = $dbh->query($sql); //penting asuuu plisss
												// $query = $dbh->prepare($sql);
												// $query->execute();
												$selection->rowCount();
												foreach ($selection as $urut) : ?>
													<option>
														<?= $urut['FirstName'] . " " . $urut['LastName'] ?></option>";
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="description">Description</label>
											<textarea name="description" id="description" class="form-control"></textarea>
										</div>
									</div>

								</div>
								<div class="submit-section">
									<button type="submit" name="edit_asset" class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php
			// if (isset($_POST['edit_asset'])) {
			// 	if (EditingAsset($_POST) > 0) {
			// 		echo "<script>alert('Data berhasil dirubah');</script>";
			// 	} else {
			// 		echo "<script>alert('Data gagal diubah');</script>";
			// 	}
			// }

			// Ini pakai PDO nanti tinggal ikutin wae si POST itu name yang ada di form atas bagian <!-- Edit Asset Modal -->
			// ikutin wae iki tinggal ganti nama oke. sesuai database dan nama si form form
			if (isset($_POST['edit_asset'])) {
				global $dbh;
				$id = htmlspecialchars($_POST['id']);
				$asset = htmlspecialchars($_POST['asset_name']);
				$asset_id = htmlspecialchars($_POST['asset_id']);
				$purchase_date = htmlspecialchars($_POST['purchase_date']);
				$purchase_from = htmlspecialchars($_POST['purchase_from']);
				$manufacturer = htmlspecialchars($_POST['manufacturer']);
				$model = htmlspecialchars($_POST['model']);
				$status = htmlspecialchars($_POST['status']);
				$supplier = htmlspecialchars($_POST['supplier']);
				$condition = htmlspecialchars($_POST['condition']);
				$warrant = htmlspecialchars($_POST['warranty']);
				$price = htmlspecialchars($_POST['value']);
				$user = htmlspecialchars($_POST['user']);
				$description = htmlspecialchars($_POST['description']);
				// Hati2 dengan query nya 
				$sql = "UPDATE `assets` SET `assetName`=:name, `assetId`=:assetId, 
				`PurchaseDate`=:purchaseDate, `PurchaseFrom`=:purchasefrom, 
				`Manufacturer`=:manufacturer, `Model`=:model, `Status`=:stats, 
				`Supplier`=:supplier, `AssetCondition`=:condition, 
				`Warranty`=:warranty, `Price`=:price, `AssetUser`=:user, 
				`Description`=:describe WHERE `id`=:id";
				$query = $dbh->prepare(($sql));
				// hati hati dengan PARAM_STR dan PARAM_INT tolong buka database buat nyocokin. semisal itu pake INT harus pakai PARAM_INT begitu juga dengan STR sesuain. okaeyyyy seemangat 💪
				$query->bindParam(':id', $id, PDO::PARAM_INT);
				$query->bindParam(':name', $asset, PDO::PARAM_STR);
				$query->bindParam(':assetId', $asset_id, PDO::PARAM_STR);
				$query->bindParam(':purchaseDate', $purchase_date, PDO::PARAM_STR);
				$query->bindParam(':purchasefrom', $purchase_from, PDO::PARAM_STR);
				$query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
				$query->bindParam(':model', $model, PDO::PARAM_STR);
				$query->bindParam(':stats', $status, PDO::PARAM_INT);
				$query->bindParam(':supplier', $supplier, PDO::PARAM_STR);
				$query->bindParam(':condition', $condition, PDO::PARAM_STR);
				$query->bindParam(':warranty', $warrant, PDO::PARAM_INT);
				$query->bindParam(':price', $price, PDO::PARAM_INT);
				$query->bindParam(':user', $user, PDO::PARAM_STR);
				$query->bindParam(':describe', $description, PDO::PARAM_STR);
				$query->execute();

				// echo $query->rowCount() . " records UPDATED successfully";
				// $query->rowCount();
				// $result = $query->fetchAll();

				return $query->rowCount();
				$lastinserted = $dbh->lastInsertId();
				if ($lastinserted > 0) {
					echo "<script>alert('Successfully Edited');</script>";
					echo "<script>window.location.href='assets.php';</script>";
					// header('location:index.php');
				} else {
					echo "<script>alert('Oh crap, something is wrong'); window.location='assets.php';</script>";
					// echo 'Error :';
					// echo '<pre>';
					// print_r($query->errorInfo());
					// print_r($query->debugDumpParams());
					// echo '</pre>';
				}
			} ?>
			<!-- Edit Asset Modal -->
			<!-- Delete Asset Modal -->
			<?php
			if (isset($_GET['delid'])) {
				$rid = intval($_GET['delid']);
				$sql = "DELETE from assets where id=:rid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':rid', $rid, PDO::PARAM_STR);
				$query->execute();
				echo "<script>
					alert('Data as deleted);
					window.location.href = 'assets.php';
					</script>";
				echo "<script>
					alert('Data can't be deleted');
					window.location.href = 'assets.php'
					</script>";
			} ?>
			<div class="modal custom-modal fade" id="delete_asset" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Asset</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0)" class="btn btn-primary continue-btn" id="link_hapus">Delete</a>
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
			<!-- /Delete Asset Modal -->
		</div>
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>
	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
	<!-- katanya sih JS biar export but who knows mfaka -->
	<!-- <script src="assets/js/tables/jquery-datatable.js"></script> -->

	<!-- Custom for edit_asset -->
	<!-- Custom buat buka tombol edit biar bisa muncul modal overlay bootstrap -->
	<!-- Ikutin di mari za https://www.youtube.com/watch?v=6U2uELbQMq8 -->
	<script>
		$(document).on("click", "#edit_assetButton", function() {
			let id = $(this).data('id');
			let name = $(this).data('name');
			let assetid = $(this).data('assetid');
			let date = $(this).data('date');
			let from = $(this).data('from');
			let Manufacturer = $(this).data('manufacturer');
			let mod = $(this).data('mod');
			let Status = $(this).data('status');
			let Supplier = $(this).data('supplier');
			let AssetCondition = $(this).data('assetcondition');
			let Warranty = $(this).data('warranty');
			let Price = $(this).data('price');
			let AssetUser = $(this).data('assetuser');
			let Description = $(this).data('description');

			// modal body ni di form edit_asset ada yang atas namanya modal-body setelah <form>
			$(".modal-body #id").val(id);
			$(".modal-body #asset_name").val(name);
			$(".modal-body #asset_id").val(assetid);
			$(".modal-body #purchase_date").val(date);
			$(".modal-body #purchase_from").val(from);
			$(".modal-body #manufacturer").val(Manufacturer);
			$(".modal-body #model").val(mod);
			$(".modal-body #status").val(Status);
			$(".modal-body #supplier").val(Supplier);
			$(".modal-body #condition").val(AssetCondition);
			$(".modal-body #warranty").val(Warranty);
			$(".modal-body #value").val(Price);
			$(".modal-body #asset_user").val(AssetUser);
			$(".modal-body #description").val(Description);
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
		// Conifrmation for deletion
		function confirm_modal(delete_url) {
			$('#delete_asset').modal('show', {
				backdrop: 'static'
			});
			document.getElementById('link_hapus').setAttribute('href', delete_url);
		};
	</script>
</body>

</html>