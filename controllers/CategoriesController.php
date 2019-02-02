<?php 

class CategoriesController {
	private $model;

	public function __construct (){
		$this->model = new CategoriesModel();
	}

	public function read ($categories = ''){
		return $this->model->read($categories);
	}
}