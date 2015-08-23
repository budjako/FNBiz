<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_menu');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Menu"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		/*if($this->session->userdata('logged_in')['is_admin']) */$this->load->view("cashier/navigation");
		$this->load->view("cashier/view_menu", $data); 				//displays the home page
		$this->load->view("footer"); 

		// session_destroy();
		// redirect('home', 'refresh');
	}

	public function get_menu(){
		$menu=$this->model_menu->get_menu();
		echo json_encode($menu);
	}

	public function order(){
		$menuarray=array_keys($this->input->post());
		
		foreach($menuarray as $item){
			echo str_replace("_", " ", $item);
			echo "<br>";
		}
	}
}
