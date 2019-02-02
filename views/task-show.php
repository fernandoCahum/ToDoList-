<?php
if($_POST['uri'] == 'task-show' && isset($_POST['task_id'])):
	$task_controller = new TasksController;
	$task = $task_controller->read($_SESSION['idUser'], $_POST['task_id']);
	$status = ($task[0]['completado']) ? 'listo' : 'pendiente';
	$templateTask = '
	<div class="row">
		<div class="col s12 m6 ">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<span class="card-title"> '. $task[0]['titulo'] .' </span>
					<p> '. ucfirst($task[0]['descripcion']) .' </p>
				</div>
				<div class="card-action">
					Status: ' . strtoupper($status) . '
				</div>
			</div>
		</div>
	</div>
	';

	print($templateTask);


endif;