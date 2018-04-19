<?php $this->load->view('admin/components/page_head'); ?>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		  <li class="nav-item active">
			<a class="nav-link" href="<?php echo site_url('admin/dashboard'); ?>">Dashboard<span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('admin/page'); ?>">Pages</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('admin/user'); ?>">Users</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link disabled" href="#">Disabled</a>
		  </li>
		</ul>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<!-- Main column-->
			<div class="col-md-8">
<?php $this->load->view($subview); ?>
			</div>
			<!-- Sidebar -->
			<div class="col-md-4">
				<section>
					<i class="fa fa-user"></i> <?php echo mailto('jkinney23@yahoo.ca', 'jkinney23@yahoo.ca'); ?><br/>
					<i class="fa fa-power-off"></i> <?php echo anchor('admin/user/logout', 'logout'); ?>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/page_tail'); ?>
