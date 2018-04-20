<?php $this->load->view('components/page_head'); ?>

<body>
<div class="container">
	<section>
		<h1><?php echo config_item('site_name'); ?></h1>
	</section>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Link<!--<b class="caret"></b>--></a>
					<ul class="dropdown-menu">
						<li class="nav-item"><a class="nav-link" href="#">Link</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Link</a></li>
					</ul>
				</li>
				<li class="nav-item"><a class="nav-link" href="#">Link</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Link</a></li>
			</ul>
		</div>
	</nav>
</div>
<div class="container">
	<div class="row">
		<!-- Main content -->
		<div class="col-md-8">
			<h2>Main content</h2>
		</div>
		
		<!-- Sidebar -->
		<div class="col-md-4">
			<h2>Recent news</h2>
		</div>
	</div>
</div>

<?php $this->load->view('components/page_tail'); ?>
