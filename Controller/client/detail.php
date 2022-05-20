<?php 
Class Detail{
	public function __construct(){
		require 'Model/ProductModel.php';
		require 'Model/CommentModel.php';
		require 'Model/RateModel.php';
		$ProductModel = new ProductModel();
		$CommentModel = new CommentModel();
		$RateModel = new RateModel();
		$id = $_GET['id'];
		$row = $ProductModel->getProduct($id);
		$comment = $CommentModel->getComments($id);
		$rate = round($RateModel->rate($id));
		$countrate = $RateModel->count($id);
		require 'View/client/pages/detail.php';
	}
}
?>