<?php  
class listUser{
	function __construct()
	{
		require '../../Model/UserModel.php';
		$UserModel = new UserModel();
		$datauser =  $UserModel->all();
		require 'pages/user/list.php';
	}
}
?>