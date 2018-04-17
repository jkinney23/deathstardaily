<?php
class Page extends Frontend_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('page_m');
	}
	
	public function index() {
		$pages = $this->page_m->get_by(array('slug' => 'about'));
		var_dump($pages);
	}
	
	public function save() {
		$data = array(
			//'title' => 'My page',
			//'slug' => 'my-page',
			'order' => '3',
			//'body' => 'This is my body...'
		);
		$id = $this->page_m->save($data, 5);
		var_dump($id);
	}
	
	public function delete() {
		$this->page_m->delete(5);
	}
}
