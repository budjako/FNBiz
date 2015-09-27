<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_menu');
	}

	public function index(){
		if(!$this->session->userdata('logged_in')) redirect('home', 'refresh');
		$data['titlepage'] = "FNBiz Menu"; 								//title page  
		$this->load->view("header", $data); 							//displays the header
		$this->load->view("cashier/navigation");
		$this->load->view("cashier/view_menu", $data); 					//displays the home page
		$this->load->view("footer"); 
	}

	public function get_menu(){
		if(!$this->session->userdata('logged_in')) redirect('home', 'refresh');
		$menu=$this->model_menu->get_menu();
		echo json_encode($menu);
	}

	public function order($orderString){
		if(!$this->session->userdata('logged_in')) redirect('home', 'refresh');
		$order=explode("_", $orderString);
		$orderList=array();
		for($i=0; ($i+2)<count($order); $i+=3){
			array_push($orderList, array($order[$i], $order[$i+1], $order[$i+2]));
		}
		$this->model_menu->new_transaction($orderList);
	}
}
