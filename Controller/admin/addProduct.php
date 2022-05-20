<?php
class AddProduct {
	public function __construct()
	{
		require('../../Model/ProductModel.php');
		require('../../Model/CategoryModel.php');
		$ProductModel = new ProductModel();
		$CategoryModel = new CategoryModel();
		$datapcategory = $CategoryModel->listChildCategory();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$file = $_FILES["anh"]["name"];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$descript = $_POST['description'];
			$idcategory = $_POST['idcategory'];
			$ProductModel->addProduct($name, $price, $quantity, $descript, $file, $idcategory);
		}
		require('pages/Product/add.php');
	}
}