<?php

	class Model_transaction extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_transactions(){
			$sql="SELECT * from itemlist INNER JOIN item ON itemlist.item_id=item.itemid order by transaction_id";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}
		
	}

?>