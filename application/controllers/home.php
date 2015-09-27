<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('model_user');
	}

	public function index($active=FALSE){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('logged_in')['is_admin']) redirect('admin/menu', 'refresh');
			redirect('cashier/menu', 'refresh');
		}
		$data['titlepage'] = "FNBiz Login"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		$this->load->view("view_login", $data); 				//displays the home page
		$this->load->view("footer"); 
	}

	public function login(){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('logged_in')['is_admin']) redirect('admin/menu', 'refresh');
			redirect('cashier/menu', 'refresh');
		}
		$data['titlepage'] = "FNBiz Log in"; //title page 
		$this->load->library('form_validation');
		$this->load->helper('security');

		// set rules in validating values supplied
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim');
		$this->form_validation->set_message('username', "Username is required.");
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|sha1');
		$this->form_validation->set_message('password', "Password is required.");

		$login;
		if (! $this->form_validation->run()){						// there are some errors in the values supplied
			$login['msg'] = validation_errors();							// show page again and show what are the errors
			$login['titlepage'] = "FNBiz Login";
			$this->load->view("header", $login);
			$this->load->view("view_login", $login); 
			$this->load->view("footer");
		}
		else{
			if($this->model_user->exists($this->input->post('username'), $this->input->post('password'))){
				$info['username'] = $this->input->post('username');
				$info['is_admin'] = $this->model_user->is_admin($info['username']);
				$this->session->set_userdata('logged_in', $info);
				if($this->session->userdata('logged_in')['is_admin']) redirect('admin/menu', 'refresh');
				redirect('cashier/menu', 'refresh');

			}
			else{	// invalid login details
				$login['msg'] = 'Invalid login details supplied.';							// show page again and show what are the errors
				$login['titlepage'] = "FNBiz Login";
				$this->load->view("header", $login);
				$this->load->view("view_login", $login); 
				$this->load->view("footer");
			}
		}
	}

	public function signup(){
		$data['titlepage'] = "FNBiz Sign Up"; 					//title page  
		$this->load->view("header", $data); 					//displays the header
		$this->load->view("view_signup", $data); 				//displays the home page
		$this->load->view("footer"); 
	}

	public function signup_submit(){
		var_dump($this->input->post());
		$data['titlepage'] = "FNBiz Sign Up"; //title page 
		$this->load->library('form_validation');
		$this->load->helper('security');

		// set rules in validating values supplied
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim');
		$this->form_validation->set_message('username', "Username is required.");
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|sha1');
		$this->form_validation->set_message('password', "Password is required.");
		$this->form_validation->set_rules('firstname', 'First Name', 'required|xss_clean|trim|ucwords');
		$this->form_validation->set_message('firstname', "First name is required.");
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|xss_clean|trim|ucwords');
		$this->form_validation->set_message('lastname', "Last name is required.");

		$signup;
		if (! $this->form_validation->run()){						// there are some errors in the values supplied
			$signup['msg'] = validation_errors();							// show page again and show what are the errors
			$this->load->view("header", $signup);
			$this->load->view("view_signup", $signup); 
			$this->load->view("footer");
		}
		else{
			$signup['username'] = $this->input->post('username');
			$signup['password'] = $this->input->post('password');
			$signup['firstname'] = $this->input->post('firstname');
			$signup['lastname'] = $this->input->post('lastname');

			$this->model_user->signup($signup);
			redirect('home', 'refresh');
		}
	}

	public function logout(){
		session_destroy();
		redirect('home', 'refresh');
	}
}