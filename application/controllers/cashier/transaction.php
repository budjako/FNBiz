<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_transaction');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Transaction"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		/*if($this->session->userdata('logged_in')['is_admin']) */$this->load->view("cashier/navigation");
		$this->load->view("cashier/view_transaction", $data); 				//displays the home page
		$this->load->view("footer"); 

		// session_destroy();
		// redirect('home', 'refresh');
	}

	public function get_transactions(){
		$transactions=$this->model_transaction->get_transactions();
		echo json_encode($transactions);
	}

}