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

	public function add_admin($username){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$this->model_account->add_admin($username);
		
	}

	public function add_user(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if(! $this->session->userdata('logged_in')['is_admin']) redirect('cashier/menu', 'refresh');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_check|callback_username_available');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_password');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'sha1|trim|required');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|ucwords|callback_firstname_check');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|ucwords|callback_lastname_check');

		$this->form_validation->set_message('username', 'Must be 9 numeric characters!');

		$data['username'] = $this->input->post('username');
		$data['password'] = sha1($this->input->post('password'));
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');

		if (! $this->form_validation->run())
		{
			$data['msg'] = validation_errors();
			$this->load->view("header", $data); 							//displays the header
			$this->load->view("admin/navigation");
			$this->load->view("admin/view_account", $data); 				//displays the home page
			$this->load->view("footer");
		}
		else $this->model_account->add_user($data);							// Save data to database
		redirect("admin/account", "refresh");
	}

	function password($str){
		return(! preg_match("/^[a-zA-Z0-9]{8,}$/i", $str))? FALSE: TRUE;
	}

	function username_check($str){
		return(! preg_match("/^[A-Za-zñÑ][A-Za-zñÑ0-9_]{4,}$/i", $str))? FALSE: TRUE;
	}

	function username_available($str){										// checks if inputted employee number is not yet used
		if(! $this->model_account->exists($str)) return true;
		else //echo "Username is not available.";
			$this->form_validation->set_message('username_available', 'Username already exists.');  
		return false;
	}

	function firstname_check($str){											// validate first name
		return(! preg_match("/^[A-Za-zñÑ]{1}[A-Za-zñÑ\s]*\.?((\.\s[A-Za-zñÑ]{2}[A-Za-zñÑ\s]*\.?)|(\s[A-Za-zñÑ][A-Za-zñÑ]{1,2}\.)|(-[A-Za-zñÑ]{1}[A-Za-zñÑ\s]*))*$/i", $str))? FALSE: TRUE;
	}

	function lastname_check($str){											// validate last name
		return(! preg_match("/^([A-Za-zñÑ]){1}([A-Za-zñÑ]){1,}(\s([A-Za-zñÑ]){1,})*(\-([A-Za-zñÑ]){1,}){0,1}$/i", $str))? FALSE: TRUE;
	}

}
