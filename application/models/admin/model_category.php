<?php

	class Model_category extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_categories(){
			$sql="SELECT * from category";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

	}

?>