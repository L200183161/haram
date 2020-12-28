<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div class="sidebar-menu">
					<ul>
						<li>
							<a href="index.php"><i class="la la-dashboard"></i> <span>Back to Dashboard</span></a>
						</li>
						<li class="menu-title">Settings</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'settings.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="settings.php"><i class="la la-building"></i> <span>Company Settings</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'localization.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="localization.php"><i class="la la-clock-o"></i> <span>Localization</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'theme-settings.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="theme-settings.php"><i class="la la-photo"></i> <span>Theme Settings</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'roles-permissions.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="roles-permissions.php"><i class="la la-key"></i> <span>Roles & Permissions</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'email-settings.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="email-settings.php"><i class="la la-at"></i> <span>Email Settings</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'invoice-settings.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="invoice-settings.php"><i class="la la-pencil-square"></i> <span>Invoice Settings</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'salary-settings.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="salary-settings.php"><i class="la la-money"></i> <span>Salary Settings</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'notifications-settings.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="notifications-settings.php"><i class="la la-globe"></i> <span>Notifications</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'change-password.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="change-password.php"><i class="la la-lock"></i> <span>Change Password</span></a>
						</li>
						<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leave-type.php'){echo 'active'; }else { echo ''; } ?>">
							<a href="leave-type.php"><i class="la la-cogs"></i> <span>Leave Type</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>