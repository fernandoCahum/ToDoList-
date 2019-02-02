<?php
if( $_POST['uri'] == 'task-add' && !isset($_POST['crud']) ){
print('
		<div class="container">
			<div class="row">
				<div class="col s12 m10 offset-m1 l6 offset-l3">
					<div class="card-panel">
						<div class="row">
							<form method="post" class="col s12">
							<div class="row">
								<div class="input-field col s12">
									<input id="title" type="text" name="titulo" class="validate">
									<label class="" for="title">Titulo</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="description" class="materialize-textarea"></textarea>
									<label class="" for="description">Descripción</label>
								</div>
							</div>
								<button class="waves-effect waves-light btn-large orange accent-4 btn__login">Aceptar</button>
								<input type="hidden" name="uri" value="task-add">
								<input type="hidden" name="crud" value="create">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
');
} elseif($_POST['uri'] == 'task-add' && $_POST['crud'] == 'create'){
	$tasks_controller = new TasksController();
	$new_task = [
		'titulo' =>  $_POST['titulo'], 
		'descripcion' =>  $_POST['descripcion'],
		'idUser' => $_SESSION['idUser']
	];
	$task = $tasks_controller->create($new_task);
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