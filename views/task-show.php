<?php
if($_POST['uri'] == 'task-show' && isset($_POST['task_id'])):
	$task_controller = new TasksController;
	$task = $task_controller->read($_SESSION['idUser'], $_POST['task_id']);
	$status = ($task[0]['completado']) ? 'listo' : 'pendiente';
	$templateTask = '
	<div class="row">
		<div class="col s12 m6 ">
			<div class="card green darken-3">
				<div class="card-content white-text">
					<div class="flex-container">
						<span> Creado: ' . date('Y/m/d', strtotime($task[0]['creado'] )). ' </span>
						<span class="card-title"> '. $task[0]['titulo'] .' </span>
					</div>
					<p> '. ucfirst($task[0]['descripcion']) .' </p>
				</div>
				<div class="card-action white-text">
					Status: ' . strtoupper($status) . '
				</div>
			</div>
		</div>
	</div>
	';

	print($templateTask);


endif;