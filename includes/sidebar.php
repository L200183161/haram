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
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'index.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="index.php">Admin Dashboard</a></li>
						<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'employee-dashboard.php') {
											echo 'active';
										} else {
											echo '';
										} ?>" href="employee-dashboard.php">Employee Dashboard</a></li>
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
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'salary-view.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="salary-view.php"> Payslip </a></li>
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'payroll-items.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="payroll-items.php"> Payroll Items </a></li>
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
					<li class="submenu">
						<a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'jobs.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="jobs.php"> Manage Jobs </a></li>
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'job-applicants.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="job-applicants.php"> Applied Candidates </a></li>
						</ul>
					</li>
					<li>
						<a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'author.php') {
										echo 'active';
									} else {
										echo '';
									} ?>" href="author.php"><i class="la la-question"></i> <span>Author</span></a>
					</li>
					<li>
						<a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'users.php') {
										echo 'active';
									} else {
										echo '';
									} ?>" href="users.php"><i class="la la-user-plus"></i> <span>Users</span></a>
					</li>

					<li class="menu-title">
						<span>Pages</span>
					</li>
					<li class="submenu">
						<a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'profile.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="profile.php"> Employee Profile </a></li>
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'client-profile.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="client-profile.php"> Client Profile </a></li>
						</ul>
					</li>
					<li class="submenu">
						<a href="#"><i class="la la-key"></i> <span> Account </span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a href="login.php"> Login </a></li>
							<li><a href="register.php"> Register </a></li>
							<li><a href="forgot-password.php"> Forgot Password </a></li>
							<li><a href="otp.php"> OTP </a></li>
							<li><a href="lock-screen.php"> Lock Screen </a></li>
						</ul>
					</li>
					<li class="submenu">
						<a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'search.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="search.php"> Search </a></li>
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'faq.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="faq.php"> FAQ </a></li>
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'terms.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="terms.php"> Terms </a></li>
							<li><a class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'privacy-policy.php') {
												echo 'active';
											} else {
												echo '';
											} ?>" href="privacy-policy.php"> Privacy Policy </a></li>
							<li><a href="error.php"> Blank Page </a></li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>