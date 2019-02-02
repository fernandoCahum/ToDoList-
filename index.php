<?php
require_once 'config/app.php';
require_once 'controllers/Autoload.php';

$autoload = new Autoload();

$route = isset($_GET['url']) ? $_GET['url'] : 'home';
$crud = new Router($route);