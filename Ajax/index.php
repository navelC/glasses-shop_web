<?php 
	require '../Model/Database.php';
	require '../Lib/function.php';
	$db = new Database();
	$controller = $_GET['controller'];
	require($controller . '.php'); /*require controller tương ứng*/
	$controller = ucfirst($controller); /*chuyển đổi chữ cái đầu tiên của chuỗi thành chữ hoa */
	$request = new $controller; 
	$db->closeDatabase();

?>