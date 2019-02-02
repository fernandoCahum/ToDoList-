<?php 
require_once __DIR__ . '/../config/env.php';

abstract class Model {
	private static $db_driver 	= DATABASE['driver'] ?? 'mysql';
	private static $db_host 		= DATABASE['host'] ?? 'localhost';
	private static $db_user 		= DATABASE['username'] ?? 'my-user';
	private static $db_pass 		= DATABASE['password'] ?? 'my-password';
	private static $db_name 		= DATABASE['database'] ?? 'my-database';
	private static $db_charset 	= DATABASE['charset'] ?? 'utf8';
	private static $db_port 		= DATABASE['port'] ?? 'pgsql';

	private $conn;
	protected $query;
	protected $rows = [];
	protected $params = [];
	
	abstract protected function create();
	abstract protected function read();
	abstract protected function update();
	abstract protected function delete();
	
	private function db_open() {
		try {
			$dsn = self::$db_driver . ":host=" . self::$db_host . "; port=" . self::$db_port . "; dbname=" . self::$db_name . "; options='-c client_encoding=utf8'";
			$this->conn = new PDO($dsn, self::$db_user, self::$db_pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// $this->conn->exec("SET CHARACTER SET " . self::$db_charset);

		} catch (PDOException $e) {

			exit("ERROR: " . $e->getMessage());
			
		}
	}

	private function db_close() {
		$this->conn = null;
	}

	protected function set_query() {
		$this->db_open();
		$this->conn->prepare($this->query)->execute($this->params);
		$this->db_close();
	}

	protected function get_query() {
		$this->db_open();
		$result = $this->conn->prepare($this->query);
		( sizeof($this->params) ) ?
			$result->execute($this->params) :
			$result->execute();
		while( $this->rows[] = $result->fetch(PDO::FETCH_ASSOC) );
		$result = null;
		$this->db_close();
		return array_pop($this->rows);
	}

}