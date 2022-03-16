<!DOCTYPE html>
<html lang="en" dir="ltr">
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
						<div class="col-md-6">
							<div class="portlet">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Send Manual</h3>
								</div>
								<div class="portlet-body">
									<form action="<?=base_url().'msg/manualcontact'?>" method="POST">
										<div class="form-group">
											<label>Recipient</label>
											<input type="text" id="phone" name="recipient" class="form-control" placeholder="Recipient" required>
										</div>
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" placeholder="Name" required>
										</div>
										<div class="form-group">
											<label>Org</label>
											<input type="text" name="org" class="form-control" placeholder="Organizations">
										</div>
										<div class="form-group">
											<label>Phone Number</label>
											<input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="portlet">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Send From Local Database</h3>
								</div>
								<div class="portlet-body">
									<form method="POST" autocomplete="off" action="<?=base_url().'msg/dbcontact'?>">
										<div class="form-group">
											<label>Recipient</label>
											<input type="text" id="phone" name="recipient" class="form-control" placeholder="Phone Number">
											<span id="status"></span>
										</div>
										<div class="form-group">
											<label>Contact</label>
											<select class="selectpicker" data-live-search="true" name="contact">
												<?php foreach($localcontact->result() as $get):?>
													<option data-tokens="<?=$get->id?>" value="<?=$get->id?>"><?=$get->name?> | <?=$get->phone?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="form-group">
											<button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
										</div>
									</form>
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
	<div class="float-btn float-btn-right">
		<button class="btn btn-flat-primary btn-icon mb-2" id="theme-toggle" data-toggle="tooltip" data-placement="right" title="Change theme">
			<i class="fa fa-moon"></i>
		</button>
	</div>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/mandatory.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/core.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/vendor.js'?>"></script>
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
</body>
</html>