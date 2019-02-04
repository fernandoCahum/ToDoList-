<?php

class TasksController {
	private $model;

	public function __construct (){
		$this->model = new TasksModel();
	}
	public function create ( $taskData = [] ) {
		return $this->model->create( $taskData );
	}

	public function read ( $idUser = '', $idTask = '' ){
		return $this->model->read( $idUser, $idTask );
	}

	public function update ( $taskData = [] ){
		return $this->model->update( $taskData );
	}

	public function delete ( $idTask = '' ) {
		return $this->model->delete( $idTask );
	}
}