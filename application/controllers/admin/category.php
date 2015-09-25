<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/model_category');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Category"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_category", $data); 				//displays the home page
		$this->load->view("footer"); 
	}

	public function get_categories(){
		$categories=$this->model_category->get_categories();
		echo json_encode($categories);
	}
}
