<?php
	session_start();
	$id=$_POST['id'];
	if($id == 0)
		unset($_SESSION['cart']);
	else
		unset($_SESSION['cart'][$id]);
?>