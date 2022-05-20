<?php 

	class Statis
	{
		
		function __construct()
		{
			require '../../Model/BillModel.php';
			require '../../Model/CommentModel.php';
			require '../../Model/UserModel.php';
			$BillModel = new BillModel();
			$CommentModel = new CommentModel();
			$UserModel = new UserModel();
			$countbill = $BillModel->count();
			$countcomment = $CommentModel->count();
			$countuser = $UserModel->count();
			$sumbill = $BillModel->sum();
			require('pages/home.php');

		}
	}
 ?>