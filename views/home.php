<?php
$template = '
<div class="row">
	<article class="col s12 m6 offset-m3 ">
		<p class="">Hola %s, bienvenid@ </p>
		<p class="">Aqui podras llevar la lista de tus tareas</p>
		<p class="">Tu email es: <b>%s</b></p>
	</article>
</div>
';
printf(
	$template,
	$_SESSION['name'],
	$_SESSION['email']
);