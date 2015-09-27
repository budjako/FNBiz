<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_expense');
	}

	public function index(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$data['titlepage'] = "FNBiz Expenses"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_expense", $data); 				//displays the home page
		$this->load->view("footer"); 

	}

	public function get_all_expenses(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$expenses=$this->model_expense->get_expenses();
		echo json_encode($expenses);
	}

}
