<?php
class SessionController {
	private $session;

	public function __construct() {
		$this->session = new UsersModel();
	}

	public function login($user, $pass) {
		$pw = md5($pass);
		return $this->session->validateUser($user, $pw);
	}

	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./');
	}

}