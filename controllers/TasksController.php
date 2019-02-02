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

	public function update ( $idTask = '' ){
		return $this->model->update( $idTask );
	}

	public function delete ( $idTask = '' ) {
		return $this->model->delete( $idTask );
	}
}