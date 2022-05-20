<?php  
class Misspass
{
	function __construct()
	{	
		$message = '';
		if(isset($_POST['post'])){
			if($_POST['code'] == $_SESSION['code']){
				$_SESSION['reset'] = 'sc';
				echo("<script>location.href = '?controller=resetpass';</script>");
			}
			else $message = 'code is not correct';
		}
		require 'View/client/pages/misspass.php';
	}
}
?>