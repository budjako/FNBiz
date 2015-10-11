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

		public function exists($username){
			$query=$this->db->get_where('user', array('username'=>$username));
			if($query->num_rows()==1) return true;
			return false;
		}

		public function get_user_info($username){
			$sql="SELECT username, firstname, lastname from user where username='".$username."'";
			$sql=$this->db->query($sql);
			return $sql->result_array()[0];
		}

		public function edit_info($data){
			$sql="UPDATE user SET username='".$data['username']."', firstname='".$data['firstname']."', lastname='".$data['lastname']."' where username='".$this->session->userdata['logged_in']['username']."'";
			$this->session->userdata['logged_in']['username']=$data['username'];
			$this->db->query($sql);
		}

		public function match_password($username, $password){
			$sql="SELECT password from user where username='".$username."'";
			$sql=$this->db->query($sql);

			if($sql->result_array()[0]['password'] == $password) return true;
			return false;
		}

		public function update_password($username, $password){
			$sql="UPDATE user SET password='".$password."' where username='".$username."'";
			$this->db->query($sql);
		}
	}

?>