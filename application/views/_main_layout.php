<?php $this->load->view('components/page_head'); ?>

<body>

<div class="container">
	<section>
		<h1><?php echo anchor('', strtoupper(config_item('site_name'))); ?></h1>
	</section>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNav">
<?php echo get_menu($menu); ?>
		</div>
	</nav>
</div>

<div class="container">
	<div class="row">
<?php $this->load->view('templates/' . $subview); ?>
	</div>
</div>

<?php $this->load->view('components/page_tail'); ?>

