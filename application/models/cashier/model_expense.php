<?php

	class Model_expense extends CI_Model {
		public function __construct(){
			$this->load->database();
		}


		public function get_expenses(){
			$sql="SELECT expensename, amount, datets from expense";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

		public function get_expenses_today(){
			$sql="SELECT expensename, amount, datets from expense where DATE(`datets`)=CURDATE()";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

		public function add_expense($expense){
			$sql="INSERT into expense (expensename, amount) values ('".$expense['expensename']."', ".$expense['amount'].")";
			$sql=$this->db->query($sql);
		}
	}

?>