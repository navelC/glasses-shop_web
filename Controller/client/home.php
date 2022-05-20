<?php /**
 * 
 */
class Home
{
	
	function __construct()
	{
		require 'Model/ProductModel.php';
		$ProductModel = new ProductModel();
		$newproduct = $ProductModel->selectNew();
		require 'View/client/pages/home.php';
	}
} ?>