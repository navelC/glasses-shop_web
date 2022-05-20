<?php /**
 * 
 */
class Profile
{
	
	function __construct()
	{
		require 'Model/BillModel.php';
		$BillModel = new BillModel();
		$id = $_SESSION['user']['id'];
		$bill = $BillModel->listByUser($id);
		require 'View/client/pages/profile.php';
	}
} ?>