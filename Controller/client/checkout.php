<?php  
class Checkout 
{
	function __construct()
	{	
		require 'Model/ProductModel.php';
		$ProductModel = new ProductModel();
		$count=0;
		if(!empty($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $key=>$value){
				$count++;
				$item[]=$key;
			}
			$str=implode(",",$item);
			$product = $ProductModel->getProductsIn($str);
			$total = 0;
		}
		require 'View/client/pages/checkout.php';

	}
}
?>