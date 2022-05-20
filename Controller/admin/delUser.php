<?php
	class DelUser{
		function __construct()
		{
			require '../../Model/UserModel.php';
			$UserModel = new UserModel();
			$id = $_POST['id'];
			$UserModel->del($id);
		}
	}

?>