<div class="menu">
	<div class="menu-item">
		<a href="<?=base_url().'home'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-desktop"></i>
			</div>
			<span class="menu-item-text">Dashboard</span>
		</a>
	</div>
	<?php 
	if ($this->session->userdata('role') == 1) { ?>
		<div class="menu-section">
			<div class="menu-section-icon">
				<i class="fa fa-ellipsis-h"></i>
			</div>
			<h2 class="menu-section-text">Administrator</h2>
		</div>
		<div class="menu-item">
			<a href="<?=base_url().'adm/users'?>" class="menu-item-link">
				<div class="menu-item-icon">
					<i class="fa fa-users"></i>
				</div>
				<span class="menu-item-text">Users</span>
			</a>
		</div>
		<div class="menu-item">
			<a href="<?=base_url().'adm/server'?>" class="menu-item-link">
				<div class="menu-item-icon">
					<i class="fa fa-server"></i>
				</div>
				<span class="menu-item-text">Server</span>
			</a>
		</div>
		<div class="menu-item">
			<a href="<?=base_url().'adm/type'?>" class="menu-item-link">
				<div class="menu-item-icon">
					<i class="fa fa-sticky-note"></i>
				</div>
				<span class="menu-item-text">FileType</span>
			</a>
		</div>
	<?php } ?>
	<div class="menu-section">
		<div class="menu-section-icon">
			<i class="fa fa-ellipsis-h"></i>
		</div>
		<h2 class="menu-section-text">Send Message</h2>
	</div>
	<div class="menu-item">
		<a href="<?=base_url().'msg/text'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-file"></i>
			</div>
			<span class="menu-item-text">Text Message</span>
		</a>
	</div>
	<div class="menu-item">
		<a href="<?=base_url().'msg/media'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-image"></i>
			</div>
			<span class="menu-item-text">Media Message</span>
		</a>
	</div>
	<div class="menu-item">
		<a href="<?=base_url().'msg/button'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-toggle-off"></i>
			</div>
			<span class="menu-item-text">Button Message</span>
		</a>
	</div>
	<!-- <div class="menu-item">
		<a href="<?=base_url().'msg/locations'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-map-marker"></i>
			</div>
			<span class="menu-item-text">Locations Message</span>
		</a>
	</div> -->
	<div class="menu-item">
		<a href="<?=base_url().'msg/sticker'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-sticky-note"></i>
			</div>
			<span class="menu-item-text">Sticker Message</span>
		</a>
	</div>
	<div class="menu-item">
		<a href="<?=base_url().'msg/contact'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-id-card"></i>
			</div>
			<span class="menu-item-text">Contact Message</span>
		</a>
	</div>
	<!-- <div class="menu-section">
		<div class="menu-section-icon">
			<i class="fa fa-ellipsis-h"></i>
		</div>
		<h2 class="menu-section-text">Groups</h2>
	</div> -->
	<!-- <div class="menu-item">
		<a href="<?=base_url().'groups/list'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-users"></i>
			</div>
			<span class="menu-item-text">List Groups</span>
		</a>
	</div>
	<div class="menu-item">
		<a href="<?=base_url().'groups/send'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-paper-plane"></i>
			</div>
			<span class="menu-item-text">Send Groups</span>
		</a>
	</div> -->
	<div class="menu-section">
		<div class="menu-section-icon">
			<i class="fa fa-ellipsis-h"></i>
		</div>
		<h2 class="menu-section-text">Contacts</h2>
	</div>
	<div class="menu-item">
		<a href="<?=base_url().'contact/api'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-fire"></i>
			</div>
			<span class="menu-item-text">API Data</span>
		</a>
	</div>
	<div class="menu-item">
		<a href="<?=base_url().'contact/local'?>" class="menu-item-link">
			<div class="menu-item-icon">
				<i class="fa fa-database"></i>
			</div>
			<span class="menu-item-text">Local Data</span>
		</a>
	</div>
</div>