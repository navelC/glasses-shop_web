<?php

class UpdateProduct {
	public function __construct()
	{
		require('../../Model/ProductModel.php');
		$id = $_GET['id'];
		$ProductModel = new ProductModel();
		$data1 = $ProductModel->getProducts($id);
		$name = NULL;
		$alert = array();
		if (isset($_POST['updateProduct'])) {
			$name = $_POST['name'];
			$ProductModel->updateProduct($name);
		}
		require('pages/product/update.php');
	}
}