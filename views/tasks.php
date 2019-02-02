<?php

$tasks_controller = new TasksController;
$tasks = $tasks_controller->read($_SESSION['idUser']);

if(empty($tasks) ):

	print(' <p> No hay tareas aún </p>');

else:

	$template_task = '
	<div class="row">
		<div class="col s12 m6 offset-m3">
			<table class="highlight responsive-table">
				<thead>
					<tr>
						<th>Tarea</th>
						<th>Status</th>
						<th colspan="3">
							<form method="POST">
								<input type="hidden" name="uri" value="task-add">
								<input class="btn-small waves-effect waves-light" type="submit" value="Agregar">
							</form>
						</th>
					</tr>
				</thead>
				<tbody>
	';
	for($i = 0; $i < count($tasks); $i++):
		$status = ($tasks[$i]['completado']) ? ' listo ' : ' pendiente ';
		$template_task .= '
			<tr>
				<td> ' . $tasks[$i]['titulo'] . ' </td>
				<td> ' . strtoupper($status) . ' </td>
				<td>
					<form method="POST">
						<input type="hidden" name="uri" value="task-show">
						<input type="hidden" name="task_id" value="' . $tasks[$i]['id_tarea'] . '">
						<input class="btn-small waves-effect waves-light" type="submit" value="Mostrar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="uri" value="task-edit">
						<input type="hidden" name="task_id" value="' . $tasks[$i]['id_tarea'] . '">
						<input class="btn-small waves-effect waves-light" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="uri" value="task-delete">
						<input type="hidden" name="task_id" value="' . $tasks[$i]['id_tarea'] . '">
						<input type="hidden" name="task_title" value="' . $tasks[$i]['titulo'] . '">
						<input class="btn-small waves-effect waves-light" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
	
	';
	endfor;

	$template_task .= '
				</tbody>
			</table>
		</div>
	</div>
	';
	print($template_task);

endif;



// if($_SESSION['idRole'] === 1):
// 	require_once 'views/layouts/dashboard.php';
// endif;

