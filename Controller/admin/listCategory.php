<?php

class ListCategory {
	public function __construct()
	{
		require('../../Model/CategoryModel.php');
		$categoryModel = new CategoryModel();
		$datachildcategories = $categoryModel->listChildCategory();
		$datacategories = $categoryModel->ListCategory();
		require('pages/category/list.php');
	}
}