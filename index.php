<?php 
	require 'Model/Database.php';
	require 'Lib/function.php';
	$db = new Database();

	require 'View/client/layouts/header.php'; /*giao diện header*/

	if (isset($_GET['controller'])) {
		require 'Route/client/web.php';/*xử lý các request trong Route/web.php*/
	} else {
		require('Controller/client/home.php'); 
		$request = new Home; 
	}

	require 'View/client/layouts/footer.php'; /*giao diện footer*/

	$db->closeDatabase();

?>