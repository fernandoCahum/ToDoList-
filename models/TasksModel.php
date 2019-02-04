<?php

class TasksModel extends Model{

	public function create ( $taskData = [] ){
		foreach ($taskData as $key => $value) {
			$$key = $value;
		}
		$this->query = "INSERT INTO tareas (titulo, descripcion, id_usuario) VALUES (:titulo, :descripcion, :idUser)";
		$this->params = [
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'idUser' => $idUser
		];
		$this->set_query();
	}

	public function read ($idUser = '', $idTask = '' ){
		if( !$idTask != ''){
			$this->query = "SELECT t.id_tarea, t.titulo, t.descripcion, t.completado AS completado FROM tareas AS t INNER JOIN usuarios AS u ON t.id_usuario = u.id WHERE u.id = :idUser";
			$this->params = ['idUser' => $idUser];
		} else {
			$this->query = "SELECT t.id_tarea, t.titulo, t.descripcion, t.completado AS completado, t.created_at AS creado FROM tareas AS t INNER JOIN usuarios AS u ON t.id_usuario = u.id WHERE u.id = :idUser AND t.id_tarea = :idTask";
			$this->params = ['idUser' => $idUser, 'idTask' => $idTask];
		}

		$this->get_query();
		$num_rows = count($this->rows);

		$data = array();
		foreach ($this->rows as $key => $value) {
		array_push($data, $value);
		}
		return $data;
	}

	public function update ( $taskData = []){
		foreach ($taskData as $key => $value) {
			$$key = $value;
		}
		$this->query = "UPDATE tareas SET titulo = :titulo, descripcion = :descripcion, completado = :completado, updated_at = :updated_at WHERE id_tarea = :idTask ";
		$this->params = [
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'completado' => $completado,
			'updated_at' => $updated_at,
			'idTask' => $idTask
		];
		$this->set_query();
	}

	public function delete ( $idTask = '' ){
		$this->query = "DELETE FROM tareas WHERE id_tarea = :idTask ";
		$this->params = ['idTask' => $idTask];
		$this->set_query();
	}
}