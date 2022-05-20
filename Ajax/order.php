<?php 
class Order
{
	function __construct()
	{
		require '../Model/BillModel.php';
		$BillModel = new BillModel();
		$status = $_POST['status'];
		$id = $_POST['id'];
		$time = getTime();
		$BillModel->changeStatus($id, $status, $time);
	}
} 
?>