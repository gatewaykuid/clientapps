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
					<div class="row portlet-row-fill-xl">
						<div class="col-xl-4">
							<div class="row portlet-row-fill-md h-100">
								<div class="col-md-12 col-xl-12">
									<div class="row portlet-row-fill-sm">
										<div class="col-sm-12">
											<div class="portlet">
												<div class="portlet-body">
													<div class="widget8" id="QRCODE">
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="row portlet-row-fill-md h-100">
								<div class="col-md-12 col-xl-12">
									<div class="row portlet-row-fill-sm">
										<div class="col-sm-12">
											<div class="portlet">
												<div class="portlet-body">
													<div class="widget8">
														<button class="btn btn-primary" data-toggle="modal" data-target="#modal3">Edit Config</button> | 
														<a href="" class="btn btn-danger"><i class="fa fa-times"></i> Logout</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="row portlet-row-fill-md h-100">
								<div class="col-md-12 col-xl-12">
									<div class="portlet portlet-primary">
										<div class="portlet-header">
											<div class="portlet-icon">
												<i class="fa fa-chalkboard"></i>
											</div>
											<h3 class="portlet-title">Devices Informations</h3>
										</div>
										<div class="portlet-body">
											<div class="portlet mb-2">
												<div class="portlet-body">
													<div class="widget5">
														<h4 class="widget5-title"><?=$wa_name?></h4>
														<div class="widget5-group">
															<div class="widget5-item">
																<span class="widget5-info">Phone</span>
																<span class="widget5-value"><?=$phone?></span>
															</div>
															<div class="widget5-item">
																<span class="widget5-info">Manufacture</span>
																<span class="widget5-value text-success"><?=$manufacture?></span>
															</div>
															<div class="widget5-item">
																<span class="widget5-info">Battery</span>
																<span class="widget5-value"><?=$battery?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
					<h5 class="modal-title">Config</h5>
					<button type="button" class="btn btn-label-danger btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>
				</div>
				<form action="<?=base_url().'adm/saveserver'?>" method="POST" autocomplete="off">
					<div class="modal-body">
						<div class="form-group">
							<label>Prefix</label>
							<input type="text" class="form-control" value="<?=$prefix?>" name="prefix" placeholder="Prefix">
						</div>
						<div class="form-group">
							<label>Usertoken</label>
							<input type="text" class="form-control" value="<?=$usertoken?>" name="usertoken" placeholder="Usertoken">
						</div>
						<div class="form-group">
							<label>Device-Key</label>
							<input type="text" class="form-control" value="<?=$devicekey?>" name="devicekey" placeholder="Usertoken">
						</div>
						<div class="form-group">
							<label>Device-ID</label>
							<input type="text" class="form-control" value="<?=$deviceid?>" name="deviceid" placeholder="Usertoken">
						</div>
					</div>
					<div class="modal-footer modal-footer-bordered">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
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
		setInterval(function(){
			$(document).ready(function() {
				$.ajax({
					type: "GET",
					url: "<?php echo base_url().'ajax/ScanQR'?>",
					success: function(response){
						$("#QRCODE").html(response);
					}
				});
			});
		}, 1000);
	</script>
</body>
</html>