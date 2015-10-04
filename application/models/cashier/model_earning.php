<?php

	class Model_earning extends CI_Model {
		public function __construct(){
			$this->load->database();
			$this->load->model('cashier/model_expense');
			$this->load->model('cashier/model_transaction');
		}

		public function get_total_earnings(){
			$data['expenses']=$this->model_expense->get_expense_amount();
			$data['sales']=$this->model_transaction->get_sales();
			echo json_encode($data);
		}

		public function get_earnings_today(){
			$data['expenses']=$this->model_expense->get_expense_amount_today();
			$data['sales']=$this->model_transaction->get_sales_today();
			echo json_encode($data);
		}
	}

?>