<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_transaction');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Transactions"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_transaction", $data); 				//displays the home page
		$this->load->view("footer"); 

	}

}
