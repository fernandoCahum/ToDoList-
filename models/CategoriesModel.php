<?php

class CategoriesModel extends Model {
	public function create () {

	}

	public function read ($name = '') {
		$this->query = ($name !== '')
					? "SELECT * FROM categories WHERE name='$name'"
					: "SELECT * FROM categories";
		$this->get_query();
		$num_rows = count($this->rows);

		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function update () {

	}

	public function delete () {
		
	}
}