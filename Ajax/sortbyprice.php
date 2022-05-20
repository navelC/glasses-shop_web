<?php 
	session_start();
	require '../Model/Database.php';
	require '../Lib/function.php';
	$db = new Database();
	require '../Model/ProductModel.php';
	$productModel = new ProductModel();
	$amount = $_POST['price'];
	$id = $_POST['id'];
	$p1 = "$";
	$amount = str_replace($p1, '', $amount);
	$amount = explode(" - ",$amount);
	$min = $amount[0];
	$max = $amount[1];
	$_SESSION['max'] = $max;
	$_SESSION['min'] = $min;
	$limit = 10;
	if(isset($_COOKIE['limit'])){
		$limit = $_COOKIE['limit'];
	}
	// if ($id != 0) {
	// 	$product = $productModel->getProductByPriceC($min, $max, $id);
	// }
	// else 
	// 	$product = $productModel->getProductByPrice($min, $max);
	$_SESSION['product1'] = filter($_SESSION['product'], $min, $max, 'price');
	$pagination = pagination($limit,$_SESSION['product1']);
	$page = $pagination ['page'];
	$products = $pagination ['product'];
	$current_page = getPage($page);
	require('../View/client/pages/shop1.php');
?>