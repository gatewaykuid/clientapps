<div class="header-holder header-holder-desktop sticky-header" id="sticky-header-desktop">
	<div class="header-container container-fluid">
		<div class="header-wrap"> </div>
		<div class="header-wrap header-wrap-block"> </div>
		<div class="header-wrap">
			<button class="btn btn-label-primary btn-icon ml-2" data-toggle="sidemenu" data-target="#sidemenu-todo">
				<i class="far fa-calendar-alt"></i>
			</button>
			<div class="dropdown ml-2">
				<button class="btn btn-flat-primary widget13" data-toggle="dropdown">
					<div class="widget13-text"> Hi <strong><?php echo $this->session->userdata('fullname') ?></strong>
					</div>
					<div class="avatar avatar-info widget13-avatar">
						<div class="avatar-display">
							<i class="fa fa-user-alt"></i>
						</div>
					</div>
				</button>
				<div class="dropdown-menu dropdown-menu-wide dropdown-menu-right dropdown-menu-animated overflow-hidden py-0">
					<div class="portlet border-0">
						<div class="portlet-footer portlet-footer-bordered rounded-0">
							<a href="<?=base_url().'login/logout'?>" class="btn btn-label-danger">Sign out</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-holder header-holder-desktop">
	<div class="header-container container-fluid">
		<h4 class="header-title"><?=$page?></h4>
	</div>
</div>
<div class="header-holder header-holder-mobile sticky-header" id="sticky-header-mobile">
	<div class="header-container container-fluid">
		<div class="header-wrap">
			<button class="btn btn-flat-primary btn-icon" data-toggle="aside">
				<i class="fa fa-bars"></i>
			</button>
		</div>
		<div class="header-wrap header-wrap-block justify-content-start px-3">
			<h4 class="header-brand">My Apps</h4>
		</div>
		<div class="header-wrap">
			<button class="btn btn-flat-primary btn-icon" data-toggle="sidemenu" data-target="#sidemenu-todo">
				<i class="far fa-calendar-alt"></i>
			</button>
			<div class="dropdown ml-2">
				<button class="btn btn-flat-primary widget13" data-toggle="dropdown">
					<div class="widget13-text"> Hi <strong><?=$this->session->userdata('fullname')?></strong>
					</div>
					<div class="avatar avatar-info widget13-avatar">
						<div class="avatar-display">
							<i class="fa fa-user-alt"></i>
						</div>
					</div>
				</button>
				<div class="dropdown-menu dropdown-menu-wide dropdown-menu-right dropdown-menu-animated overflow-hidden py-0">
					<div class="portlet border-0">
						<div class="portlet-footer portlet-footer-bordered rounded-0">
							<a href="<?=base_url().'login/logout'?>" class="btn btn-label-danger">Sign out</a>
						</div>
					</div>
					<!-- END Portlet -->
				</div>
			</div>
			<!-- END Dropdown -->
		</div>
	</div>
</div>