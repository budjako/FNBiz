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
		$expenses=$this->model_expense->get_expenses_today();
		echo json_encode($expenses);
	}

	public function add_expense($string){
		// $expense=$this->input->post();
		// var_dump($expense);
		// var_dump($string);
		$string=explode("_", $string);
		$name=$string[0];
		for($i=1; $i<count($string)-1; $i++){
			$name.=" ".$string[$i];	
		}
		$this->model_expense->add_expense($name, $string[count($string)-1]);
	}
}