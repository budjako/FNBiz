<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/model_account');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Accounts"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_account", $data); 				//displays the home page
		$this->load->view("footer"); 

	}

}
