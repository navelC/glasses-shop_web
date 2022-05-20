<?php
	class FavouriteModel extends Database
	{
		
		protected $db;
		public function __construct(){
			$this->db = new Database();
			$this->db->connect();
		}
		public function insert($iduser, $idproduct){
			$sql = "INSERT into favourite(iduser, idproduct) VALUES($iduser, $idproduct)";
			$result = $this->db->conn->query($sql);
		}
		public function delete($iduser, $idproduct){
			$sql = "DELETE FROM favourite WHERE iduser= $iduser and idproduct = $idproduct";
			$result = $this->db->conn->query($sql);
		}
		
		public function select($iduser){
			$sql = "SELECT product.*, favourite.id as favourite,rating.rate FROM `product` inner JOIN favourite on product.id = favourite.idproduct AND iduser= $iduser left join rating on rating.iduser = favourite.iduser";
			$result = $this->db->conn->query($sql);
			while ($data = $result->fetch_array()) {
				$list[] = $data;
			}
			return $list;
		}
	}
?>