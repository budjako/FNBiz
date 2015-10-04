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

		public function edit_category($values){
			$sql="UPDATE category SET categoryname='".$values['categoryname']."', categorydesc='".$values['categorydesc']."' where categoryid=".$values['categoryid'];
			$this->db->query($sql);
		}

		public function add_category($values){
			$sql="INSERT INTO category (categoryname, categorydesc) VALUES ('".$values['catnameadd']."', '".$values['catdescadd']."')";
			$this->db->query($sql);
		}
	}

?>