<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Earning extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_earning');
		$this->load->model('cashier/model_transaction');
		$this->load->model('cashier/model_expense');
	}

	public function index(){
		if(!$this->session->userdata('logged_in')) redirect('home', 'refresh');
		$data['titlepage'] = "FNBiz Earning"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("cashier/navigation");
		$this->load->view("cashier/view_earning", $data); 				//displays the home page
		$this->load->view("footer"); 
	}

	public function get_earnings_today(){
		if(!$this->session->userdata('logged_in')) redirect('home', 'refresh');
		echo json_encode($this->model_earning->get_earnings_today());
	}

	public function get_earnings_today_info(){
		$info=array();
		// sales
		$info['sales']=$this->model_transaction->get_sales_today();
		// expenses
		$info['expenses']=$this->model_expense->get_expense_amount_today();
		// earning
		$info['earning']=$info['sales']-$info['expenses'];
		echo json_encode($info);
	}


}