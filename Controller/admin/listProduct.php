<?php
class ListProduct {
	public function __construct()
	{
		require('../../Model/ProductModel.php');
		$ProductModel = new ProductModel();
		$dataproduct = $ProductModel->getProducts();
		require('pages/Product/list.php');
	}
}