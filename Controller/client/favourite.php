<?php /**
 * 
 */
class Favourite
{
	
	function __construct()
	{
		require 'Model/FavouriteModel.php';
		$ProductModel = new FavouriteModel();
		if (isset($_SESSION['user'])) 
			$iduser = $_SESSION['user']['id'];
		else echo "<script>window.location.href='./';</script>";
		$product = $ProductModel->select($iduser);
		require 'View/client/pages/favourite.php';
	}
} ?>