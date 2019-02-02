<?php
print('
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> ToDo | HOME </title>
		<link rel="shortcut icon" type="image/png" href="public/img/favicon/image.png"/>
		<link rel="stylesheet" href="public/css/reset.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link rel="stylesheet" href="public/css/styles.css">
	</head>
	<body>
		<div id="root" class="root">
			<header class="Header">
				<nav>
					<div class="nav-wrapper dark-primary-color">
						<a href="/" class="brand-logo">ToDo</a>
');
						if(isset($_SESSION['idUser'])):
							$lastName = explode(' ', $_SESSION['lastName']);

							$template ='
								<ul id="nav-mobile" class="right hide-on-med-and-down">
									<li><span>' . ucfirst($_SESSION['name']) .' ' . $lastName[0] . ' </span></li>
									<li><a href="tareas">Tareas</a></li>
									<li><a href="salir">Logout</a></li>
								</ul>
							';
							print($template);
						endif;
print('
					</div>
				</nav>
			</header>
			<main class="Main">
');
