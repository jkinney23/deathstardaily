<?php $this->load->view('components/page_head'); ?>

<body>

<div class="container">
	<section>
		<h1><?php echo anchor('', strtoupper(config_item('site_name'))); ?></h1>
	</section>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
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

