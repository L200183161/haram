<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title">
					<span>Main</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<?php if ($_SESSION['role'] == "admin") { ?>
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'index.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="index.php">Admin Dashboard</a></li>
						<?php
						} ?>
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="dashboard.php">Employee Dashboard</a></li>
					</ul>
				</li>

				<li class="menu-title">
					<span>Employees</span>
				</li>
				<li class="submenu">
					<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'employees.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="employees.php">All Employees</a></li>
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'departments.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="departments.php">Departments</a></li>
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'designations.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="designations.php">Designations</a></li>
					</ul>
				</li>
				<?php if ($_SESSION['role'] == 'employee') { ?>
					<li>
						<a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'salary.php') {
										echo 'active';
									} else {
										echo '';
									} ?>" href="salary.php"><i class="la la-money"></i> <span>Salary</span></a>
					</li>

				<?php } ?>
				<!-- Permission admin only -->
				<?php if ($_SESSION['role'] == "admin") { ?>
					<li class="menu-title">
						<span>HR</span>
					</li>
					<li class="submenu">
						<a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'salary.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="salary.php"> Employee Salary </a></li>
						</ul>
					</li>
					<li class="menu-title">
						<span>Administration</span>
					</li>
					<li>
						<a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'assets.php') {
										echo 'active';
									} else {
										echo '';
									} ?>" href="assets.php"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
					</li>
					<li>
						<a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'users.php') {
										echo 'active';
									} else {
										echo '';
									} ?>" href="users.php"><i class="la la-user-plus"></i> <span>Users</span></a>
					</li>
				<?php } ?>
				<li class="menu-title">
					<span>Pages</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-columns"></i> <span> Information </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'faq.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="faq.php"> FAQ </a></li>
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'terms.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="terms.php"> Terms </a>
						</li>
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'privacy-policy.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="privacy-policy.php"> Privacy Policy </a>
						</li>
						<li>
							<a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'author.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="author.php">About us</a>
						</li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-key"></i> <span> Account </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="logout.php"> Logout </a></li>
					</ul>
				</li>
				<!-- Dark Mode without localstorage 😭 -->
				<div class="submenu onoffswitch">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="btn-toggle" checked>
					<label class="onoffswitch-label" for="btn-toggle" title="Dark Mode Switcher" data-placement="left" data-toggle="tooltip">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</ul>
			<!-- I didnt use any theme preference but i use this button just to change the style only. hope i have a lot of time to make this feature available in future by saving in side server script or localstorage cheers ©donny -->
		</div>
	</div>
</div>
<script>
	const btn = document.querySelector("#btn-toggle");
	const theme = document.querySelector("#theme-link");
	btn.addEventListener("click", function() {
		// Swap out the URL for the different stylesheets
		if (theme.getAttribute("href") == "assets/css/style.css") {
			theme.href = "assets/css/dark.css";
		} else {
			theme.href = "assets/css/style.css";
		}
	});
	// Locaal
</script>