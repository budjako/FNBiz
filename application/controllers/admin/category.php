<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/model_category');
	}

	public function index(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$data['titlepage'] = "FNBiz Category"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		$this->load->view("admin/navigation");
		$this->load->view("admin/view_category", $data); 				//displays the home page
		$this->load->view("footer"); 
	}

	public function get_categories(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$categories=$this->model_category->get_categories();
		echo json_encode($categories);
	}

	public function edit_category(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		// validate
		$this->model_category->edit_category($this->input->post());
		redirect('admin/category', 'refresh');
	}

	public function add_category(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		var_dump($this->input->post());

		$this->load->library('form_validation');

		$this->form_validation->set_rules('catnameadd', 'catnameadd', 'trim|required|callback_catnameadd_check|callback_alphaspace');
		$this->form_validation->set_rules('catdescadd', 'catdescadd', 'trim|required|callback_alphaspace');

		$data['catnameadd'] = $this->input->post('catnameadd');
		$data['catdescadd'] = $this->input->post('catdescadd');

		if (! $this->form_validation->run()){
			$data['msg'] = validation_errors();
			$this->load->view("header", $data); 							//displays the header
			$this->load->view("admin/navigation");
			$this->load->view("admin/view_category", $data); 				//displays the home page
			$this->load->view("footer");
		}
		$this->model_category->add_category($data);
		redirect("admin/category", "refresh");
	}

	public function alphaspace($string){
		return(! preg_match("/^[A-Za-zñÑ][A-Za-zñÑ\s]{4,}$/i", $str))? FALSE: TRUE;
	}
}
