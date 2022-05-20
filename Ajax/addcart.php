<?php
	session_start();
	$id = $_POST['id'];
	if(isset($_SESSION['cart'][$id]))
		$qty = $_SESSION['cart'][$id] + 1;
	else
		$qty=1;
	if(isset($_POST['quantity'])) $_SESSION['cart'][$id] = $_POST['quantity'];
	else $_SESSION['cart'][$id]=$qty;

?>