<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Earning extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_menu');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Earning"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		/*if($this->session->userdata('logged_in')['is_admin']) */$this->load->view("cashier/navigation");
		$this->load->view("cashier/view_earning", $data); 				//displays the home page
		$this->load->view("footer"); 

		// session_destroy();
		// redirect('home', 'refresh');
	}

}