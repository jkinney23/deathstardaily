<?php
class Dashboard extends Admin_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->data['subview'] = 'admin/dashboard/index';
		//$this->data['users'] = $this->user_m->get();
		//var_dump($this->data['users']);
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function modal() {
		$this->load->view('admin/_layout_modal', $this->data);
	}
}
