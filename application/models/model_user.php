<?php

	class Model_user extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function signup($signup){
			$this->db->insert('user', array('username' => $signup['username'], 'firstname' => $signup['firstname'], 'lastname' => $signup['lastname'], 'password' => $signup['password']));
		}

		public function is_admin($username){
			$this->db->select('admin');
			$admin=$this->db->get_where('user', array('username' => $username));

			if($admin->num_rows()==1){
				if($admin->result_array()[0]['admin'] == 1) return true;
			}
			return false;
		}

		public function exists($username, $password){
			$query=$this->db->get_where('user', array('username'=>$username, 'password'=>$password));
			if($query->num_rows()==1) return true;
			return false;
		}
	}

?>