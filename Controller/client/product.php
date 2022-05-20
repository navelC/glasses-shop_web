<?php
class Product{
	public function __construct(){
		require('Model/ProductModel.php');
		$productModel = new ProductModel();
		$limit = 8;
		$id = 0;
		if(isset($_COOKIE['limit'])){
			$limit = $_COOKIE['limit'];
		}
		$timkiem ='';
		
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$product = $this->listByCategory($productModel,$id);
		}
		else {
			$product = $this->listAll($productModel);
		}
		// if (isset($_GET['search'])) {
	 //        $timkiem = $_GET['search'];
	 //        $mysqli = new mysqli("localhost","root","","bankinh");
	 //        $sql = "select *from product where name like '%$timkiem%' or price like '%$timkiem%'";
	 //        $result = $mysqli -> query($sql);
	 //        $product = $result->fetch_array();
	 //    }
		$_SESSION['product'] = $product;
		$min = getMin($product,'price'); 
		$max = getMax($product,'price');
		if(isset($_SESSION['max']) || isset($_SESSION['min'])){
			$value1 = $_SESSION['min'];
			$value2 = $_SESSION['max'];
			$product = filter($product, $value1,$value2, 'price');
		}
		else{
			$value1 = $min;
			$value2 = $max;
			$product = filter($product, $value1, $value2 , 'price');
		}
		$pagination = pagination($limit,$product);
		$page = $pagination['page'];
		$products = $pagination['product'];
		$current_page = getPage($page);
		require('View/client/pages/shop.php');
	}
	public function listAll($userModel) {
		return $userModel->getProducts();

	}
	public function listByCategory($userModel, $id) {
		return $userModel->getProductByCategory($id);
	}
	
	

}
?>