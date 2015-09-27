<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/model_account');
	}

	public function index(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$data['titlepage'] = "FNBiz Accounts"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_account", $data); 				//displays the home page
		$this->load->view("footer"); 

	}

	public function get_accounts(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$accounts=$this->model_account->get_accounts();
		echo json_encode($accounts);
	}

}
