<?php
class Dashboard extends Admin_Controller
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load_>view('_layout_main');
	}
	
	public function modal() {
		$this->load->view('_layout_modal');
	}
}
