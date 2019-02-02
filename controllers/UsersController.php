<?php

class UsersController {
	private $model;

	public function __construct() {
		$this->model = new UsersModel;
	}

	public function read ($id = ''){
		return $this->model->read($id);
	}
}