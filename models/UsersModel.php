<?php

class UsersModel extends Model {

	public function create (){

	}

	public function read ($id = ''){
		$this->query = ($id !== '')
										? "SELECT id, nom_nombres, nom_apellidos, email, id_role FROM usuarios WHERE id = :id"
										: "SELECT id, nom_nombres, nom_apellidos, email, id_role FROM usuarios";
		$this->params = [':id' => $id];
		
		$this->get_query();
		$num_rows = count($this->rows);

		$data = array();
		foreach ($this->rows as $key => $value) {
		array_push($data, $value);
		}
		return $data;
	}

	public function update (){

	}

	public function delete (){

	}

	public function validateUser ($email, $pass){
		$this->query = "SELECT * FROM usuarios WHERE email = :email AND password= :pass";
		$this->params = [':email' => $email, ':pass' => $pass];
		$this->get_query();
		$data = [];
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
}