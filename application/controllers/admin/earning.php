<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Earning extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_earning');
	}

	public function index(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$data['titlepage'] = "FNBiz Earnings"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_earning", $data); 				//displays the home page
		$this->load->view("footer"); 

	}

	public function get_earnings_info(){
		// sales
		$info=array();
		$info['sales']=$this->model_transaction->get_sales();
		// expenses
		$info['expenses']=$this->model_expense->get_expense_amount();
		// earning
		$info['earning']=$info['sales']-$info['expenses'];
		echo json_encode($info);
	}
}
