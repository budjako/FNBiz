<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('model_user');
	}

	public function index(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		$data['titlepage'] = "FNBiz Profile"; 							//title page  
		$this->load->view("header", $data); 							//displays the header
		if(! $this->session->userdata('logged_in')['is_admin'])			// not an admin
			$this->load->view("cashier/navigation");
		else															// admin
			$this->load->view("admin/navigation");
		$this->load->view("cashier/view_profile", $data); 				//displays the home page
		$this->load->view("footer"); 
	}

	public function get_account_info(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		$info=$this->model_user->get_user_info($this->session->userdata()['logged_in']['username']);
		echo json_encode($info);
	}

	public function edit_info(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_check|callback_username_available');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|ucwords|callback_firstname_check');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|ucwords|callback_lastname_check');

		$this->form_validation->set_message('username', 'Must be 9 numeric characters!');

		$data['username'] = $this->input->post('username');
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');

		if (! $this->form_validation->run()){
			$data['msg'] = validation_errors();
			$this->load->view("header", $data); 							//displays the header
			if(! $this->session->userdata('logged_in')['is_admin'])			// not an admin
				$this->load->view("cashier/navigation");
			else															// admin
				$this->load->view("admin/navigation");
			$this->load->view("account", $data); 				//displays the home page
			$this->load->view("footer");
		}
		else $this->model_user->edit_info($data);							// Save data to database
		redirect("account", "refresh");
	}

	function update_password(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'sha1|trim|required|callback_password_regex');
		$this->form_validation->set_message('password_regex', 'Invalid password.');

		if (! $this->form_validation->run()){
			$data['msg'] = validation_errors();
			$this->load->view("header", $data); 							//displays the header
			if(! $this->session->userdata('logged_in')['is_admin'])			// not an admin
				$this->load->view("cashier/navigation");
			else															// admin
				$this->load->view("admin/navigation");
			$this->load->view("account", $data); 				//displays the home page
			$this->load->view("footer");
		}
		$data['password'] = $this->input->post('password');
		$this->model_user->update_password($this->session->userdata('logged_in')['username'], $data['password']);
		redirect("account", "refresh");
	}

	function verify_password(){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'sha1|trim|required|callback_password_regex');
		$this->form_validation->set_message('password', 'Password mismatch!');  
		$this->form_validation->set_message('password_regex', 'Invalid password.');
		$this->form_validation->set_message('match', 'Password mismatch.');  
		// var_dump($this->input->post());
		if (! $this->form_validation->run()){
			// echo validation_errors();
			echo "mismatch";
			return;
		}
		$data['password'] = $this->input->post('password');
		// var_dump($this->input->post());
		if($this->match($data['password'])) echo "match";					// uses the method match to check if the password
		else echo "mismatch";
	}

	function match($password){
		if(! $this->session->userdata('logged_in')) redirect('home', 'refresh');
		if($this->model_user->match_password($this->session->userdata('logged_in')['username'], $password)) return true;
		return false;
	}

	function password_regex($str){
		return(! preg_match("/^[a-zA-Z0-9]{8,}$/i", $str))? FALSE: TRUE;
	}

	function username_check($str){
		return(! preg_match("/^[A-Za-zñÑ][A-Za-zñÑ0-9_]{4,}$/i", $str))? FALSE: TRUE;
	}

	function exists($str){
		if($str==$this->session->userdata('logged_in')['username']) return;
		if($this->model_user->exists($str)){
			echo "yes";
			return;
		}
		echo "no";
	}

	function username_available($str){										// checks if inputted employee number is not yet used
		if(! $this->model_user->exists($str)) return true;
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