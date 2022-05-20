<?php  
class Cart 
{
	function __construct()
	{	
		require 'Model/ProductModel.php';
		$ProductModel = new ProductModel();
		$count = 0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = $_POST['id'];
			$quantity = $_POST['quantity'];
			$_SESSION['cart'][$id] = $quantity;
		}
		if(!empty($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $key=>$value){
				$count++;
				$item[]=$key;
			}
			var_dump($_SESSION['cart']);
			$str=implode(",",$item);
			$product = $ProductModel->getProductsIn($str);
			$total = 0;
		}
		require 'View/client/pages/cart.php';

	}
}
?>