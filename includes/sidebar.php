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
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'active'; }else { echo ''; } ?>" href="index.php">Admin Dashboard</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'employee-dashboard.php'){echo 'active'; }else { echo ''; } ?>" href="employee-dashboard.php">Employee Dashboard</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'chat.php'){echo 'active'; }else { echo ''; } ?>" href="chat.php">Chat</a></li>
						<li class="submenu">
							<a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'voice-call.php'){echo 'active'; }else { echo ''; } ?>" href="voice-call.php">Voice Call</a></li>
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'video-call.php'){echo 'active'; }else { echo ''; } ?>" href="video-call.php">Video Call</a></li>
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'outgoing-call.php'){echo 'active'; }else { echo ''; } ?>" href="outgoing-call.php">Outgoing Call</a></li>
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'incoming-call.php'){echo 'active'; }else { echo ''; } ?>" href="incoming-call.php">Incoming Call</a></li>
							</ul>
						</li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'events.php'){echo 'active'; }else { echo ''; } ?>" href="events.php">Calendar</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contacts.php'){echo 'active'; }else { echo ''; } ?>" href="contacts.php">Contacts</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'inbox.php'){echo 'active'; }else { echo ''; } ?>" href="inbox.php">Email</a></li>
						
					</ul>
				</li>
				<li class="menu-title">
					<span>Employees</span>
				</li>
				<li class="submenu">
					<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'employees.php'){echo 'active'; }else { echo ''; } ?>" href="employees.php">All Employees</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'holidays.php'){echo 'active'; }else { echo ''; } ?>" href="holidays.php">Holidays</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leaves.php'){echo 'active'; }else { echo ''; } ?>" href="leaves.php">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span></a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leaves-employee.php'){echo 'active'; }else { echo ''; } ?>" href="leaves-employee.php">Leaves (Employee)</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leave-settings.php'){echo 'active'; }else { echo ''; } ?>" href="leave-settings.php">Leave Settings</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'attendance.php'){echo 'active'; }else { echo ''; } ?>" href="attendance.php">Attendance (Admin)</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'attendance-employee.php'){echo 'active'; }else { echo ''; } ?>" href="attendance-employee.php">Attendance (Employee)</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'departments.php'){echo 'active'; }else { echo ''; } ?>" href="departments.php">Departments</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'designations.php'){echo 'active'; }else { echo ''; } ?>" href="designations.php">Designations</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'timesheet.php'){echo 'active'; }else { echo ''; } ?>" href="timesheet.php">Timesheet</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'overtime.php'){echo 'active'; }else { echo ''; } ?>" href="overtime.php">Overtime</a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'active'; }else { echo ''; } ?>" href="clients.php"><i class="la la-users"></i> <span>Clients</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'projects.php'){echo 'active'; }else { echo ''; } ?>" href="projects.php">Projects</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'tasks.php'){echo 'active'; }else { echo ''; } ?>" href="tasks.php">Tasks</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'task-board.php'){echo 'active'; }else { echo ''; } ?>" href="task-board.php">Task Board</a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leads.php'){echo 'active'; }else { echo ''; } ?>" href="leads.php"><i class="la la-user-secret"></i> <span>Leads</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'tickets.php'){echo 'active'; }else { echo ''; } ?>" href="tickets.php"><i class="la la-ticket"></i> <span>Tickets</span></a>
				</li>
				<li class="menu-title">
					<span>HR</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'estimates.php'){echo 'active'; }else { echo ''; } ?>" href="estimates.php">Estimates</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'invoices.php'){echo 'active'; }else { echo ''; } ?>" href="invoices.php">Invoices</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'payments.php'){echo 'active'; }else { echo ''; } ?>" href="payments.php">Payments</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'expenses.php'){echo 'active'; }else { echo ''; } ?>" href="expenses.php">Expenses</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'provident-fund.php'){echo 'active'; }else { echo ''; } ?>" href="provident-fund.php">Provident Fund</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'taxes.php'){echo 'active'; }else { echo ''; } ?>" href="taxes.php">Taxes</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'salary.php'){echo 'active'; }else { echo ''; } ?>" href="salary.php"> Employee Salary </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'salary-view.php'){echo 'active'; }else { echo ''; } ?>" href="salary-view.php"> Payslip </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'payroll-items.php'){echo 'active'; }else { echo ''; } ?>" href="payroll-items.php"> Payroll Items </a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'policies.php'){echo 'active'; }else { echo ''; } ?>" href="policies.php"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'expense-reports.php'){echo 'active'; }else { echo ''; } ?>" href="expense-reports.php"> Expense Report </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'invoice-reports.php'){echo 'active'; }else { echo ''; } ?>" href="invoice-reports.php"> Invoice Report </a></li>
					</ul>
				</li>
				<li class="menu-title">
					<span>Performance</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'performance-indicator.php'){echo 'active'; }else { echo ''; } ?>" href="performance-indicator.php"> Performance Indicator </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'performance.php'){echo 'active'; }else { echo ''; } ?>" href="performance.php"> Performance Review </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'performance-appraisal.php'){echo 'active'; }else { echo ''; } ?>" href="performance-appraisal.php"> Performance Appraisal </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'goal-tracking.php'){echo 'active'; }else { echo ''; } ?>" href="goal-tracking.php"> Goal List </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'goal-type.php'){echo 'active'; }else { echo ''; } ?>" href="goal-type.php"> Goal Type </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'training.php'){echo 'active'; }else { echo ''; } ?>" href="training.php"> Training List </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'trainers.php'){echo 'active'; }else { echo ''; } ?>" href="trainers.php"> Trainers</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'training-type.php'){echo 'active'; }else { echo ''; } ?>" href="training-type.php"> Training Type </a></li>
					</ul>
				</li>
				<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'promotion.php'){echo 'active'; }else { echo ''; } ?>" href="promotion.php"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
				<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'resignation.php'){echo 'active'; }else { echo ''; } ?>" href="resignation.php"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
				<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'termination.php'){echo 'active'; }else { echo ''; } ?>" href="termination.php"><i class="la la-times-circle"></i> <span>Termination</span></a></li>
				<li class="menu-title">
					<span>Administration</span>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'assets.php'){echo 'active'; }else { echo ''; } ?>" href="assets.php"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'jobs.php'){echo 'active'; }else { echo ''; } ?>" href="jobs.php"> Manage Jobs </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'job-applicants.php'){echo 'active'; }else { echo ''; } ?>" href="job-applicants.php"> Applied Candidates </a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'knowledgebase.php'){echo 'active'; }else { echo ''; } ?>" href="knowledgebase.php"><i class="la la-question"></i> <span>Knowledgebase</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'activities.php'){echo 'active'; }else { echo ''; } ?>" href="activities.php"><i class="la la-bell"></i> <span>Activities</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'users.php'){echo 'active'; }else { echo ''; } ?>" href="users.php"><i class="la la-user-plus"></i> <span>Users</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'settings.php'){echo 'active'; }else { echo ''; } ?>" href="settings.php"><i class="la la-cog"></i> <span>Settings</span></a>
				</li>
				<li class="menu-title">
					<span>Pages</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'profile.php'){echo 'active'; }else { echo ''; } ?>" href="profile.php"> Employee Profile </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'client-profile.php'){echo 'active'; }else { echo ''; } ?>" href="client-profile.php"> Client Profile </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="login.php"> Login </a></li>
						<li><a href="register.php"> Register </a></li>
						<li><a href="forgot-password.php"> Forgot Password </a></li>
						<li><a href="otp.php"> OTP </a></li>
						<li><a href="lock-screen.php"> Lock Screen </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-exclamation-triangle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="error-404.php">404 Error </a></li>
						<li><a href="error-500.php">500 Error </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-hand-o-up"></i> <span> Subscriptions </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'subscriptions.php'){echo 'active'; }else { echo ''; } ?>" href="subscriptions.php"> Subscriptions (Admin) </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'subscriptions-company.php'){echo 'active'; }else { echo ''; } ?>" href="subscriptions-company.php"> Subscriptions (Company) </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'subscribed-companies.php'){echo 'active'; }else { echo ''; } ?>" href="subscribed-companies.php"> Subscribed Companies</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'search.php'){echo 'active'; }else { echo ''; } ?>" href="search.php"> Search </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'faq.php'){echo 'active'; }else { echo ''; } ?>" href="faq.php"> FAQ </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'terms.php'){echo 'active'; }else { echo ''; } ?>" href="terms.php"> Terms </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'privacy-policy.php'){echo 'active'; }else { echo ''; } ?>" href="privacy-policy.php"> Privacy Policy </a></li>
						<li><a href="blank-page.php"> Blank Page </a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
</div>
