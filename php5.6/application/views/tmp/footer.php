<div class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<p class="text-left mb-0">Copyright <i class="far fa-copyright"></i> <span id="copyright-year"></span> My Apps. All rights reserved</p>
			</div>
			<div class="col-md-6 d-none d-md-block">
				<p class="text-right mb-0">Login On <?=$this->agent->browser().' '.$this->agent->version()?> | IP <?=getClientIP()?> | Page rendered in <strong>{elapsed_time}</strong></p>
			</div>
		</div>
	</div>
</div>