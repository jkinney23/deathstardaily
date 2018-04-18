<?php $this->load->view('admin/components/page_head'); ?>

<body style="background: #555">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Page title</h5> -->
        <h3>Page title</h3>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
      	&copy; <?php echo $meta_title ?>
      </div>
    </div>
  </div>

<?php $this->load->view('admin/components/page_tail'); ?>
