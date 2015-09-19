<?php

	class Model_transaction extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_transactions(){
			$sql="SELECT * from itemlist INNER JOIN item ON itemlist.item_id=item.itemid where DATE(`time`)=CURDATE() order by transaction_id";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

		public function get_transactions_today(){
			$sql="SELECT * from itemlist INNER JOIN item INNER JOIN transaction ON itemlist.item_id=item.itemid and itemlist.transaction_id=transaction.transactionid where DATE(`time`)=CURDATE() order by transaction_id";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

		public function get_sales_today(){
			$sql="SELECT sum(total) from transaction where DATE(`time`)=CURDATE()";
			$sql=$this->db->query($sql);
			if(is_null($sql->result_array()[0]['sum(total)'])) return 0;
			return $sql->result_array()[0]['sum(total)'];
		}
		
	}

?>