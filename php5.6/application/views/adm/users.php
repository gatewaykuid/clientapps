<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
	<link href="<?=base_url().'assets/build/styles/ltr-core.css'?>" rel="stylesheet">
	<link href="<?=base_url().'assets/build/styles/ltr-vendor.css'?>" rel="stylesheet">
	<link href="<?=base_url().'assets/images/favicon.ico'?>" rel="shortcut icon" type="image/x-icon">
	<title><?=$page?> | Apps</title>
</head>
<body class="theme-light preload-active aside-active aside-mobile-minimized aside-desktop-maximized" id="fullscreen">
	<div class="preload">
		<div class="preload-dialog">
			<div class="spinner-border text-primary preload-spinner"></div>
		</div>
	</div>
	<div class="holder">
		<div class="aside">
			<div class="aside-header">
				<h3 class="aside-title"><?=APPNAME.' '.VERSION?></h3>
				<div class="aside-addon">
					<button class="btn btn-label-primary btn-icon btn-lg" data-toggle="aside">
						<i class="fa fa-times aside-icon-minimize"></i>
						<i class="fa fa-thumbtack aside-icon-maximize"></i>
					</button>
				</div>
			</div>
			<div class="aside-body" data-simplebar="data-simplebar">
				<?php $this->load->view('tmp/menud') ?>
			</div>
		</div>
		<div class="wrapper">
			<div class="header">
				<?php $this->load->view('tmp/header') ?>
				<div class="header-holder header-holder-mobile">
					<div class="header-container container-fluid">
						<div class="header-wrap header-wrap-block justify-content-start w-100">
							<div class="breadcrumb">
								<a href="<?=base_url().''?>" class="breadcrumb-item">
									<div class="breadcrumb-icon">
										<i data-feather="home"></i>
									</div>
									<span class="breadcrumb-text">Users</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content ">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="portlet">
								<div class="portlet-header portlet-header-bordered">
									<button class="btn btn-outline-primary" data-toggle="modal" data-target="#modal3">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg><span> Add Users</span>
									</button>
								</div>
								<div class="portlet-body">
									<table id="datatable-1" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>Fullname</th>
												<th>Phone</th>
												<th>Username</th>
												<th>Role</th>
												<th>Create At</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($usersdata->result() as $get):?>
												<tr>
													<td><?=$no++?></td>
													<td><?=$get->fullname?></td>
													<td><?=$get->phone?></td>
													<td><?=$get->username?></td>
													<td>
														<?php
														if ($get->role == 1) {
															echo "Administrator";
														}elseif ($get->role == 2) {
															echo "Member";
														}
														?>
													</td>
													<td><?=$get->create_at?></td>
													<td>#</td>
												</tr>
											<?php endforeach;?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('tmp/footer') ?>
		</div>
	</div>
	<div class="scrolltop">
		<button class="btn btn-info btn-icon btn-lg">
			<i class="fa fa-angle-up"></i>
		</button>
	</div>
	<?php $this->load->view('changelogs') ?>
	<div class="modal fade" id="modal3">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-bordered">
					<h5 class="modal-title">Add Users</h5>
					<button type="button" class="btn btn-label-danger btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>
				</div>
				<form action="<?=base_url().'adm/addusers'?>" method="POST" autocomplete="off">
					<div class="modal-body">
						<div class="form-group">
							<label>Fullname</label>
							<input type="text" class="form-control" name="fullname" placeholder="Fullname">
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
							<h5 id="status"></h5>
						</div>
						<div class="form-group">
							<label>Role</label>
							<select class="form-control" name="role">
								<option value="1">Administrator</option>
								<option value="2">Member</option>
							</select>
						</div>
					</div>
					<div class="modal-footer modal-footer-bordered" id="showbuttons"></div>
				</form>
			</div>
		</div>
	</div>
	<div class="float-btn float-btn-right">
		<button class="btn btn-flat-primary btn-icon mb-2" id="theme-toggle" data-toggle="tooltip" data-placement="right" title="Change theme">
			<i class="fa fa-moon"></i>
		</button>
	</div>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/mandatory.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/core.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/vendor.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/app/datatable/basic/base.js'?>"></script>
	<script type="text/javascript">
		<?php 
		if ($this->session->flashdata('success')) { ?>
			toastr.success("<?php echo $this->session->flashdata('success'); ?>");
		<?php }elseif ($this->session->flashdata('info')) { ?>
			toastr.info("<?php echo $this->session->flashdata('info'); ?>");
		<?php }elseif ($this->session->flashdata('warning')) { ?>
			toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
		<?php }elseif ($this->session->flashdata('error')) { ?>
			toastr.error("<?php echo $this->session->flashdata('error'); ?>");
		<?php } ?>
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#phone').keyup(function() {
				var data = $('#phone').val();
				$.ajax({
					type: "POST",
					data: {"id":data},
					url: "<?php echo base_url().'ajax/checkcontacts'?>",
					success: function(response){
						$("#status").html(response);
					}
				});
				$.ajax({
					type: "POST",
					data: {"id":data},
					url: "<?php echo base_url().'ajax/showbuttons'?>",
					success: function(response){
						$("#showbuttons").html(response);
					}
				});
			})
		});
	</script>
</body>
</html>