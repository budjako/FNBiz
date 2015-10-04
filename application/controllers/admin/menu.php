<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('cashier/model_menu');
	}

	public function index(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$data['titlepage'] = "FNBiz Menu"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_menu", $data); 				//displays the home page
		$this->load->view("footer"); 

		// session_destroy();
		// redirect('home', 'refresh');
	}

	public function get_menu(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$menu=$this->model_menu->get_menu();
		echo json_encode($menu);
	}

	public function get_menu_full(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$menu=$this->model_menu->get_menu_full();
		echo json_encode($menu);
	}

	public function get_categories(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$categories=$this->model_menu->get_categories();
		echo json_encode($categories);
	}

	public function order($orderString){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$order=explode("_", $orderString);
		$orderList=array();
		for($i=0; ($i+2)<count($order); $i+=3){
			array_push($orderList, array($order[$i], $order[$i+1], $order[$i+2]));
		}
		$this->model_menu->new_transaction($orderList);
	}

	public function availability($item){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$item=explode("_", $item);
		$this->model_menu->availability($item[0], $item[1]);
	}

	public function add_menu(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		// var_dump($this->input->post());

		$name=$this->input->post()['addmenuname'];
		$category=$this->input->post()['addmenucategory'];
		$price=$this->input->post()['addmenuprice'];

		$this->model_menu->add_menu($name, $category, $price);
		redirect("admin/menu", "refresh");
	}
}
