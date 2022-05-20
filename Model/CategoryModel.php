<?php

class CategoryModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function addChildCategory($name ,$id){
		$name = $this->db->conn->real_escape_string($name);
		$sql = "INSERT into sub_category(name, idcategory) values('$name', $id)";
		$this->db->conn->query($sql);

	}
	public function addCategory($name){
		$name = $this->db->conn->real_escape_string($name);
		$sql = "INSERT into category(name) values('$name')";
		$this->db->conn->query($sql);
	}
	public function listCategory(){
		$sql = "SELECT * from category";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function listColumnName(){
		$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'category'";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function listChildCategory(){
		$sql = "SELECT * from sub_category";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function updateChildCategory($name, $id, $idcategory){
		$name = $this->db->conn->real_escape_string($name);
		$sql = "UPDATE sub_category set name = $name, idcategory = $idcategory WHERE id = $id";
		$result = $this->db->conn->query($sql);
	}
	public function updateCategory(){
		$sql = "SELECT * from sub_category";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function getSubCategory($id){
		$sql = "SELECT * from sub_category WHERE id = $id";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data;
	}
	public function getCategory($id){
		$sql = "SELECT * from category WHERE id = $id";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data;
	}
	public function delSubCategory($id){
		$sql = "DELETE from sub_category WHERE id = $id";
		$result = $this->db->conn->query($sql);
	}
	public function delCategory($id){
		$sql = "DELETE from category WHERE id = $id";
		$result = $this->db->conn->query($sql);
	}
}
?>