<?php /**
 * 
 */
class Comment
{
	
	function __construct()
	{
		require '../Model/CommentModel.php';
		require '../Model/RateModel.php';
		$CommentModel = new CommentModel();
		$RateModel = new RateModel();
		$content = $_POST['content'];
		$iduser = $_POST['iduser'];
		$idproduct = $_POST['idproduct'];
		$rate = $_POST['star'];
		$CommentModel->insert($content, $iduser, $idproduct);
		$RateModel->insert($iduser, $idproduct, $rate);
		$i = 1;
		$message = '<div class="rating1" >'.
					'<ul class="stars">';
		while ($i <= $rate) {
			$message.= '<li><a href="javascript:;"><i  class="fa fa-star active" aria-hidden="true"></i></a></li>';
			$i++;
		}
		while ($i <=5 ) {
			$message.= '<li><a href="javascript:;"><i  class="fa fa-star" aria-hidden="true"></i></a></li>';
			$i++;
		}
		$message .= '</ul>'.
					'</div>';
		echo $message;
	}
} ?>