<?php 
class Favourite
{
	function __construct()
	{
		require '../Model/FavouriteModel.php';
		$FavouriteModel = new FavouriteModel();
		$type = $_POST['type'];
		$idproduct = $_POST['id'];
		$iduser = $_POST['iduser'];
		if ($type=='add') {
			$FavouriteModel->insert($iduser, $idproduct);
		}
		else if($type=='del') {
			$FavouriteModel->delete($iduser, $idproduct);
		}
	}
} 
?>