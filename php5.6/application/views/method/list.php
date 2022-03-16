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
						<div class="col-md-12">
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Text Message</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Message Type : 1.</p>
									<b><?=base_url()?>send?type=1&<span style="color:red">to=DestinationNumber</span>&<span style="color:red">msg=Your message</span></b>
								</div>
							</div>
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Media Message</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Message Type : 2.</p>
									<b><?=base_url()?>send?type=2&<span style="color:red">to=DestinationNumber</span>&<span style="color:red">msg=Your message</span>&<span style="color:red">url=Media URL</span></b>
								</div>
							</div>
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Buttons Message</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Message Type : 3.</p>
									<b><?=base_url()?>send?type=3&<span style="color:red">to=DestinationNumber</span>&<span style="color:red">msg=Your message</span>&<span style="color:red">button=example1,example2,example3</span>&<span style="color:red">reply=example1,example2,example3</span>&<span style="color:red">footer=Copyright</span></b>
								</div>
							</div>
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Sticker Message</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Message Type : 4.</p>
									<b><?=base_url()?>send?type=4&<span style="color:red">to=DestinationNumber</span>&<span style="color:red">url=Image URL</span></b>
								</div>
							</div>
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Contact Message</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Message Type : 5.</p>
									<b><?=base_url()?>send?type=5&<span style="color:red">to=DestinationNumber</span>&<span style="color:red">name=Contact Name</span>&<span style="color:red">phone=Contact Phone</span>&<span style="color:red">org=Contact Organization ( Optional )</span></b>
								</div>
							</div>
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Locations Message</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Message Type : 6.</p>
									<b><?=base_url()?>send?type=6&<span style="color:red">to=DestinationNumber</span>&<span style="color:red">coor=latitude,longitude</span></b>
								</div>
							</div>
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Show Groups</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Type : 1.</p>
									<b><?=base_url()?>groups?type=1</b>
								</div>
							</div>
							<div class="portlet portlet-collapsed">
								<div class="portlet-header portlet-header-bordered">
									<h3 class="portlet-title">Detail Groups</h3>
									<div class="portlet-addon">
										<button class="btn btn-label-info btn-icon" data-toggle="portlet" data-target="parent" data-behavior="toggleCollapse">
											<i class="fa fa-angle-down"></i>
										</button>
									</div>
								</div>
								<div class="portlet-body">
									<p class="mb-0">Type : 1.</p>
									<b><?=base_url()?>groups?type=1&<span style="color:red">group_id=xxx</span></b>
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
	<div class="float-btn float-btn-right">
		<button class="btn btn-flat-primary btn-icon mb-2" id="theme-toggle" data-toggle="tooltip" data-placement="right" title="Change theme">
			<i class="fa fa-moon"></i>
		</button>
	</div>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/mandatory.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/core.js'?>"></script>
	<script type="text/javascript" src="<?=base_url().'assets/build/scripts/vendor.js'?>"></script> 
</body>
</html>