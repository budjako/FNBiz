<?php

	class Model_earning extends CI_Model {
		public function __construct(){
			$this->load->database();
			$this->load->model('cashier/model_expense');
			$this->load->model('cashier/model_transaction');
		}

		public function get_earnings_today(){
			$expenses=$this->model_expense->get_expense_amount_today();
			$sales=$this->model_transaction->get_sales_today();
			return $sales-$expenses;
		}
	}

?>