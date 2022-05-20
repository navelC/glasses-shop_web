<?php
class ProductModel extends Database{
	protected $db;
	protected $iduser = 0;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
		if (isset($_SESSION['user'])) {
			$this->iduser = $_SESSION['user']['id'];
		}
	}
	public function getProducts(){
		$sql = "SELECT product.*,rating.rate ,favourite.id as favourite FROM product LEFT JOIN rating on rating.idproduct = product.id LEFT JOIN favourite on product.id = favourite.idproduct AND favourite.iduser = $this->iduser GROUP by product.id"; 
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function getProductsIn($id){
		$sql="select product.* from product  where id in ($id) ";
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function getProductByCategory($id){
		$sql = "SELECT product.*,rating.rate ,favourite.id as favourite FROM product  LEFT JOIN rating on rating.idproduct = product.id LEFT JOIN favourite on product.id = favourite.idproduct AND favourite.iduser =  $this->iduser where idcategory = $id GROUP by product.id"; 
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function getProduct($id){
		$sql = "SELECT product.* FROM product where id = $id "; 
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data;
	}
	public function addProduct($name, $price, $quantity, $descript, $file, $idcategory){
		$sql = "INSERT into product(name,price,quantity,images,description,idcategory) values('$name',$price,$quantity,'$file','$descript',$idcategory)";
		if (file_exists("../../Public/client/images/".basename($file))) {
			$this->db->conn->query($sql);
			echo "thêm sản phẩm thành công";
		}
		else if (move_uploaded_file($_FILES["anh"]["tmp_name"], "../../Public/client/images/".basename($file))){
			$this->db->conn->query($sql);
			echo "thêm sản phẩm thành công";
		}
		else echo "tải ảnh không thành công";
	}
	public function reduceQ($array)
	{
		$value = '';
		$count = 0;
		foreach ($array as $key => $values) {
			if($count ==0 ){
				$value.= "($key, $values, $values)";
				$count++;
			}
			else $value.= ",($key, $values, $values)";
		}
		$sql = "INSERT INTO product (id, quantity, sold) VALUES $value ON DUPLICATE KEY UPDATE id=VALUES(id), quantity=quantity - VALUES(quantity),sold = sold + VALUES(sold)";
		$this->db->conn->query($sql);
	}
	public function selectNew()
	{
		$sql = "SELECT product.*,rating.rate ,favourite.id as favourite FROM product LEFT JOIN rating on rating.idproduct = product.id LEFT JOIN favourite on product.id = favourite.idproduct AND favourite.iduser =  $this->iduser ORDER BY date_created   desc LIMIT 0,8";
		$result = $this->db->conn->query($sql);
		echo $sql;
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}

	// public function getProductByPrice($min, $max){
	// 	$sql = "SELECT * FROM product where price between $min and $max"; 
	// 	$result = $this->db->conn->query($sql);
	// 	while($data = $result->fetch_array()){
	// 		$list[] = $data;
	// 	}
	// 	return $list;
	// }
	// public function getProductByPriceC($min, $max, $id){
	// 	$sql = "SELECT * FROM product where price between $min and $max AND idcategory = $id"; 
	// 	$result = $this->db->conn->query($sql);
	// 	while($data = $result->fetch_array()){
	// 		$list[] = $data;
	// 	}
	// 	return $list;
	// }
	
	
	
} 
?>