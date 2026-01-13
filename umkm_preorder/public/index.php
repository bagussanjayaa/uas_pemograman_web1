<?php
session_start();

require_once '../config/config.php';
require_once '../app/core/Router.php';

$url = $_GET['url'] ?? 'auth/login';
$router = new Router();
$router->run($url);
