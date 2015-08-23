<?php

	class Model_menu extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_menu(){
			$sql="SELECT itemname, itemcategory, itemprice from item order by itemname";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

	}

?>