<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_expense');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Expenses"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_expense", $data); 				//displays the home page
		$this->load->view("footer"); 

	}

}
