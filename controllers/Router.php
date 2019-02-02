<?php

class Router {
	public $route;
	
	public function __construct($route) {

		$session_options = [
			'cookie_lifetime' => 86400
		];

		if( !isset($_SESSION) )  session_start($session_options);
		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;
		
		if($_SESSION['ok']) {
			//Aquí va toda la programación de nuestra webapp
			$this->route = isset($_GET['url']) ? $_GET['url'] : 'home';
			$controller = new ViewController();
			switch ($this->route) {
				case 'home':
					$controller->load_view('home');
					break;
				case 'tareas':
					if( !isset( $_POST['uri'] ) )  $controller->load_view('tasks');
					else if( $_POST['uri'] === 'task-add' )  $controller->load_view('task-add');
					else if( $_POST['uri'] === 'task-edit' )  $controller->load_view('task-edit');
					else if( $_POST['uri'] === 'task-delete' )  $controller->load_view('task-delete');
					else if( $_POST['uri'] === 'task-show' )  $controller->load_view('task-show');
					break;
				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;
				
				default:
					$controller->load_view('error404');
					break;
			}
		}
			else {
			if( !isset($_POST['email']) && !isset($_POST['pass']) ) {
				//mostrar un formulario de autenticación
				$login_form = new ViewController();
				$login_form->load_view('login');
			} else {
					$user_session = new SessionController();
					$session = $user_session->login($_POST['email'], $_POST['pass']);

				if( empty($session) ) {
					//echo 'El usuario y el password son incorrectos';
					$login_form = new ViewController();
					$login_form->load_view('login');
					header('Location: ./?error=El usuario ' . $_POST['email'] . ' y/o contraseña no coinciden');
				} else {
					// echo 'Se inicio sesión exitosamente';
					//var_dump($session);
					$_SESSION['ok'] = true;
					foreach ($session as $row):
						$_SESSION['idUser'] = $row['id'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['name'] = $row['nom_nombres'];
						$_SESSION['lastName'] = $row['nom_apellidos'];
						$_SESSION['idRole'] = $row['id_role'];
					endforeach;
					header('Location: ./');
				}
			}
		}

	}
}