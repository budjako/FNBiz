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

		public function get_expense_amount_today(){
			$sql="SELECT sum(amount) from expense where DATE(`datets`)=CURDATE()";
			$sql=$this->db->query($sql);
			if(is_null($sql->result_array()[0]['sum(amount)'])) return 0;
			return $sql->result_array()[0]['sum(amount)'];
		}

		public function add_expense($name, $amount){
			$sql="INSERT into expense (expensename, amount) values ('".$name."', ".$amount.")";
			$sql=$this->db->query($sql);
		}
	}

?>