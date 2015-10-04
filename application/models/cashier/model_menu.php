<?php

	class Model_menu extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_menu(){
			$sql="SELECT itemid, itemname, itemcategory, itemprice from item where available=1 order by itemname";
			$sql=$this->db->query($sql);
			return $sql->result_array() ;
		}

		public function get_menu_full(){
			$sql="SELECT itemid, itemname, itemcategory, itemprice, available from item order by itemname";
			$sql=$this->db->query($sql);
			return $sql->result_array() ;
		}

		public function new_transaction($order){
			$total=0;
			foreach ($order as $item) {
				// $item[0] itemid
				// $item[1] count
				// $item[2] price
				$total+=$item[1]*$item[2];
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
				$sql.="(".$id.", ".$item[0].", ".$item[1].")";
			}
			$sql=$this->db->query($sql);

		}

		public function availability($itemid, $toggle){
			$sql="UPDATE `fnbiz`.`item` SET `available` = ".$toggle." WHERE `item`.`itemid` = ".$itemid.";";
			$this->db->query($sql);
		}

		public function get_categories(){
			$sql="SELECT categoryid, categoryname from category";
			$sql=$this->db->query($sql);
			return $sql->result_array();
		}

		public function add_menu($name, $category, $price){
			$sql="INSERT INTO item (itemname, itemcategory, itemprice) VALUES ('".$name."', '".$category."', ".$price.")";
			$this->db->query($sql);
		}

	}

?>