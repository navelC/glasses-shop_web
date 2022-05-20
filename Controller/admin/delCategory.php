<?php
class DelCategory {
	public function __construct()
	{
		require('../../Model/CategoryModel.php');
		$id = $_POST['id'];
		$type = $_POST['type'];
		$categoryModel = new CategoryModel();
		if ($type == 'sub_category') {
				$categoryModel->delSubCategory($id);
			}
		else $categoryModel->delCategory($id);
	}
}