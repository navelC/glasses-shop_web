<?php  

class Signup{
	public function __construct(){
		require('Model/UserModel.php');
		$userModel = new UserModel();
		$message = $this->signUp($userModel);
		require('View/client/pages/regis.php');	
	}
	public function signUp($userModel) {
		$message = NULL;
		if (isset($_POST['signup'])) {
			$username = $_POST['name'];
			$password = md5($_POST['pass']);
			$email = $_POST['email'];
			if ($username && $password && $email) {
				$checkuser = $userModel->checkExistsName($username);
				$checkemail = $userModel->checkExistsEmail($email);
				if ($checkuser->num_rows > 0) {
					$message = '* Tên đăng nhập đã bị trùng';
				}
				else if($checkemail->num_rows > 0) {
					$message = '* Email đã bị trùng';
				}else {
					$userModel->signup($username, $password, $email);
						echo "<script>	
							alert('đăng ký thành công');
							location.href='?controller=signin';
						</script>";
				}
			}
			
		}

		return $message;
	}
}

?>