<?php

	class Model_account extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_accounts(){
			$sql="SELECT username, firstname, lastname, admin from user";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

		public function add_admin($username){
			$sql="UPDATE user SET admin=1 where username='".$username."'";
			$this->db->query($sql);
		}

		public function add_user($data){
			$sql="INSERT INTO user (username, password, firstname, lastname) VALUES ('".$data['username']."', '".$data['password']."', '".$data['firstname']."', '".$data['lastname']."')";
			$this->db->query($sql);
		}

		public function exists($username){
			$sql="SELECT username from user where username='".$username."'";
			$sql=$this->db->query($sql);
			if($sql->num_rows()>0) return true;
			return false;
		}
	}

?>