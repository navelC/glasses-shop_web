<?php
	class RateModel extends Database
	{
		
		protected $db;
		public function __construct(){
			$this->db = new Database();
			$this->db->connect();
		}
		public function insert($iduser, $idproduct, $rate){
			$sql = "INSERT into rating(iduser, idproduct, rate) VALUES($iduser, $idproduct, $rate)"	;
			$result = $this->db->conn->query($sql);
		}
		public function rate($idproduct){
			$sql = "SELECT AVG(rate) as rate FROM rating WHERE idproduct= $idproduct";
			$result = $this->db->conn->query($sql);
			$data = $result->fetch_array();
			return $data['rate'];
		}
		public function count($idproduct){
			$sql = "SELECT count(rate) as count FROM rating WHERE idproduct= $idproduct";
			$result = $this->db->conn->query($sql);
			$data = $result->fetch_array();
			return $data['count'];
		}
	}
?>