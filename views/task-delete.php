<?php

$tasks_controller = new TasksController();


if( $_POST['uri'] == 'task-delete' && !isset($_POST['crud']) ) {
	$template_ms = '
			<h2 class="p1">Eliminar Tarea</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar la Tarea: 
					<mark class="p1">'. $_POST['task_title'] .'</mark>?
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="idTask" value="'. $_POST['task_id'] .'">
					<input type="hidden" name="uri" value="task-delete">
					<input type="hidden" name="crud" value="delete">
				</div>
			</form>
		';
		print( $template_ms );

}elseif($_POST['uri'] == 'task-delete' && $_POST['crud'] == 'delete' ){

	$task = $tasks_controller->delete( $_POST['idTask'] );

	$templateTask = '
		<div class="container">
			<p class="item  delete">Tarea: <b>eliminada</b> </p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("tareas")
			}
		</script>
	';
	print($templateTask);
}