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
<body class="theme-light preload-active" id="fullscreen">
	<div class="preload">
		<div class="preload-dialog">
			<div class="spinner-border text-primary preload-spinner"></div>
		</div>
	</div>
	<div class="holder">
		<div class="wrapper">
			<div class="content ">
				<div class="container-fluid">
					<div class="row no-gutters align-items-center justify-content-center h-100">
						<div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
							<div class="portlet">
								<div class="portlet-body">
									<div class="text-center mb-4">
										<div class="avatar avatar-label-primary avatar-circle widget12">
											<div class="avatar-display">
												<i class="fa fa-user-alt"></i>
											</div>
										</div>
									</div>
									<form id="login-form" action="<?=base_url().'login/gologin'?>" method="POST">
										<div class="form-group">
											<div class="float-label float-label-lg">
												<input class="form-control form-control-lg" type="text" name="username" placeholder="Please insert your username">
												<label for="email">Username</label>
											</div>
										</div>
										<div class="form-group">
											<div class="float-label float-label-lg">
												<input class="form-control form-control-lg" type="password" name="password" placeholder="Please insert your password">
												<label for="password">Password</label>
											</div>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<button type="submit" class="btn btn-label-primary btn-lg btn-widest">Login</button>
										</div>
									</form>
								</div>
							</div>
							<center><span style="font-size: 15px;">Your IP : <?=getClientIP()?>
								(
									<?php
									$clientip = getClientIP();
									$get = json_decode(file_get_contents("https://ipinfo.io/".$clientip."?token=2a31a7457a9324", TRUE));
									$code = $get->country;
									$country = countryCodeToCountry($code);
									echo $country;
									?>
								)
							</span></center>
						</div>
					</div>
				</div>
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
	<script type="text/javascript" src="<?=base_url().'assets/app/pages/login.js'?>"></script>
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