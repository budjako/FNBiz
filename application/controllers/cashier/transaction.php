<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_transaction');
	}

	public function index(){
		if(!$this->session->userdata('logged_in')) redirect('home', 'refresh');
		$data['titlepage'] = "FNBiz Transaction"; 							//title page  
		$this->load->view("header", $data); 								//displays the header
		$this->load->view("cashier/navigation");
		$this->load->view("cashier/view_transaction", $data); 				//displays the home page
		$this->load->view("footer"); 
	}

	public function get_transactions(){
		if(!$this->session->userdata('logged_in')) redirect('home', 'refresh');
		$transactions=$this->model_transaction->get_transactions_today();
		echo json_encode($transactions);
	}

}