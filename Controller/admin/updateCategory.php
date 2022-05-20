<?php

class UpdateCategory {
	public function __construct()
	{
		require('../../Model/CategoryModel.php');
		$id = $_GET['id'];
		$type = $_GET['type'];
		$categoryModel = new CategoryModel();
		$data = $categoryModel->getSubCategory($id);
		$data1 = $categoryModel->getCategory($id);
		$datacategories =  $categoryModel->listCategory($id);
		$name = NULL;
		$alert = array();
		if (isset($_POST['updateCategory'])) {
			$name = $_POST['name'];
			$type = $_POST['typecategory'];
			if ($type == 'sub_category') {
				$idcategory = $_POST['idcategory'];
				$categoryModel->updateChildCategory($name,$id,$idcategory);
				$alert['success'] = 'Thêm thành công';
			}
			else $categoryModel->updateCategory($name);
		}
		require('pages/category/update.php');
	}
}