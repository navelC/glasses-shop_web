<?php
class Sendcode
{
	function __construct()
	{
		session_start();
		require '../Model/UserModel.php';
		$UserModel = new UserModel();
		$email = $_POST['email'];
		$message = '';
		$user = $UserModel->checkExistsEmail($email);
		if(!empty($user)){
			$code = rand(100000,999999);
			$id = $user['id'];
			ini_set("SMTP","ssl://smtp.gmail.com");
			$to      = $email;
			$subject = 'Tìm lại mật khẩu';
			$message = 'Mã code của bạn là: '.$code;
			$headers = 'From: <lvcuong.19it2@vku.udn.vn>'."\r\n";
			$headers .= "charset=UTF-8" . "\r\n";
			if(mail($to,$subject,$message,$headers)){
				$message = 'send code successfully';
				$_SESSION['id'] = $id;
				$_SESSION['code'] = $code;
			}
			else $message = 'Email address does not exist';
		}
		else $message = 'Account not found';
		echo  $message;
	}
} 
?>