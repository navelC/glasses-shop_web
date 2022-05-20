<?php

class AddCategory {
	public function __construct()
	{
		require('../../Model/CategoryModel.php');
		$categoryModel = new CategoryModel();
		$data = $categoryModel->listCategory();
		$name = NULL;
		$alert = array();
		if (isset($_POST['addCategory'])) {
			$name = $_POST['name'];
			$type = $_POST['typecategory'];
			if ($type == 'sub_category') {
				$idcategory = $_POST['idcategory'];
				$categoryModel->addChildCategory($name,$idcategory);
				$alert['success'] = 'Thêm thành công';
			}
			else $categoryModel->addCategory($name);
		}
		
		require('pages/category/add.php');
	}
}