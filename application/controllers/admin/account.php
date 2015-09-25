<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_menu');
	}

	public function index(){
		$data['titlepage'] = "FNBiz Accounts"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_menu", $data); 				//displays the home page
		$this->load->view("footer"); 

		// session_destroy();
		// redirect('home', 'refresh');
	}

	public function get_menu(){
		$menu=$this->model_menu->get_menu();
		echo json_encode($menu);
	}

	public function order($orderString){
		$order=explode("_", $orderString);
		$orderList=array();
		for($i=0; ($i+2)<count($order); $i+=3){
			array_push($orderList, array($order[$i], $order[$i+1], $order[$i+2]));
		}
		$this->model_menu->new_transaction($orderList);
	}
}
