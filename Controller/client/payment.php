<?php  
class Payment 
{
	function __construct()
	{	
		require 'Model/BillModel.php';
		require 'Model/ProductModel.php';
		$BillModel = new BillModel();
		$ProductModel = new ProductModel();
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$amount = $_POST['total'];
		$address = $_POST['address'];
		$id = $_SESSION['user']['id'];
		$datetime = getTime();
		$date = date("d/m/Y");
		$idbill = $BillModel->insertBill($amount,$datetime,$id,$name,$phone,$address);
		$BillModel->insertDetailBill($idbill, $_SESSION['cart']);
		$ProductModel->reduceQ($_SESSION['cart']);
		$count = 0;
		foreach($_SESSION['cart'] as $key=>$value){
			$count++;
			$item[]=$key;
		}
		$str=implode(",",$item);
		$product = $ProductModel->getProductsIn($str);
		$total = 0;
		ini_set("SMTP","ssl://smtp.gmail.com");
		$to      = $_SESSION['user']['email'];
		$subject = 'chúc mừng bạn đã đặt hàng thành công';
		$message = require 'View/client/pages/bill.php';
		$headers = 'From: <lvcuong.19it2@vku.udn.vn>'."\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		if(mail($to,$subject,$message,$headers)) 
			unset($_SESSION['cart']);
		echo $message;

	}
}
?>