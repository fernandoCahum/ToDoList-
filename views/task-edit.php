<?php
$tasks_controller = new TasksController();
if( $_POST['uri'] == 'task-edit' && isset($_POST['task_id']) ) {
	$task = $tasks_controller->read($_SESSION['idUser'], $_POST['task_id']);
	print('
	<div class="container">
		<div class="row">
			<div class="col s12 m10 offset-m1 l6 offset-l3">
				<div class="card-panel">
					<div class="row">
						<form method="post" class="col s12">
						<div class="row">
							<div class="input-field col s12">
								<input id="title" type="text" name="titulo" class="validate" value=" '. $task[0]['titulo'] . '">
								<label class="" for="title">Titulo</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<textarea id="description" name="descripcion" class="materialize-textarea"> '. $task[0]['descripcion'] . '</textarea>
								<label class="" for="description">Descripción</label>
							</div>
						</div>
						<p>
							<label>
								<input name="status" type="radio" value="false" checked />
								<span>Pendiente</span>
							</label>
						</p>
						<p>
							<label>
								<input name="status" type="radio" value="true" />
								<span>Listo</span>
							</label>
						</p>

							<button class="waves-effect waves-light btn-large orange accent-4 btn__login">Aceptar</button>
							<input type="hidden" name="uri" value="task-edit">
							<input type="hidden" name="idTask" value="'. $_POST['task_id'] .'">
							<input type="hidden" name="crud" value="edit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	');
}elseif($_POST['uri'] == 'task-edit' && $_POST['crud'] == 'edit'){
	$new_task = [
		'titulo' =>  $_POST['titulo'], 
		'descripcion' =>  $_POST['descripcion'],
		'completado' =>  $_POST['status'],
		'updated_at' =>  date("Y-m-d H:i:s"),
		'idTask' => $_POST['idTask']
	];
	$task = $tasks_controller->update($new_task);
	$template = '
		<div class="container">
			<p class="item  add">Tarea <b>%s</b> se ha guardado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("tareas")
			}
		</script>
	';
	printf($template, $_POST['titulo']);
}