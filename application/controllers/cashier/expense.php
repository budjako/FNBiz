<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_expense');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Expense"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		/*if($this->session->userdata('logged_in')['is_admin']) */$this->load->view("cashier/navigation");
		$this->load->view("cashier/view_expense", $data); 				//displays the home page
		$this->load->view("footer"); 

		// session_destroy();
		// redirect('home', 'refresh');
	}

	public function get_expenses(){
		$expenses=$this->model_expense->get_expenses();
		echo json_encode($expenses);
	}

	public function add_expense(){
		$expense=$this->input->post();
		$this->model_expense->add_expense($expense);
	}
}