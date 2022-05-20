<?php
	session_start(); /*đăng ký phiên làm việc*/
        ob_start();
    require '../../Lib/function.php';
	require '../../Model/Database.php';
	$db = new Database();
	if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin' ) {
		require('layouts/header.php');

		if (isset($_GET['controller'])) {
			require '../../Route/admin/web.php'; /*xử lý các request trong Route/web.php*/
		} else {
			$controller = 'statis';
			require('../../Controller/admin/' . $controller . '.php'); 
			$controller = ucfirst($controller); 
			$request = new $controller; 
		}

		require('layouts/footer.php');
	} else {
		header('Location: ../../');
	}

	$db->closeDatabase(); 