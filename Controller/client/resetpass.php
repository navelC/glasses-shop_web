<?php  
class Resetpass
{
	function __construct()
	{	
		if (!isset($_SESSION['id']) || $_SESSION['reset']!='sc') {
			echo "<script>location.href = './';</script>";
		}
		$message = '';
		if (isset($_POST['reset'])) {
			require 'Model/UserModel.php';
			$userModel = new UserModel();
			$message = $this->Reset($userModel);
		}
		require 'View/client/pages/reset.php';
	}
	public function Reset($userModel) {
		$messages = NULL;
		$password = md5($_POST['your_pass']);
		$id =  $_SESSION['id'];
		$check = $userModel->resetPass($id, $password);
		if($check == 'true'){
			unset($_SESSION['id']);
			unset($_SESSION['reset']);
			unset($_SESSION['code']);
			echo "<script>alert('Reset password successfully'); location.href = './';</script>";
		}
		else $messages = 'Reset failed';
		return $messages;
	}
}
?>