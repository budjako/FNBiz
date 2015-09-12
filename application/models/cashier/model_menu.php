<?php

	class Model_menu extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_menu(){
			$sql="SELECT itemid, itemname, itemcategory, itemprice from item order by itemname";
			$sql=$this->db->query($sql);
			return $sql->result_array() ;
		}

		public function new_transaction($order){
			$total=0;
			foreach ($order as $item) {
				$total+=$item[0]*$item[1];
			}

			$sql="INSERT INTO transaction (total) values (".$total.")";
			$this->db->query($sql);

			$sql="SELECT max(transactionid) from transaction";
			$sql=$this->db->query($sql);
			$id=$sql->result_array()[0]['max(transactionid)'];
			$sql="INSERT INTO itemlist (transaction_id, item_id, count) values ";

			$i=0;
			foreach ($order as $item) {
				if($i==0) $i=1;
				else $sql.=",";
				$sql.="(".$id.", ".$item[2].", ".$item[0].")";
			}
			$sql=$this->db->query($sql);

		}

	}

?>