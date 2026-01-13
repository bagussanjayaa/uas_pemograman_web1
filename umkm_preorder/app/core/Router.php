<?php
require_once '../config/config.php';

class Router {
    public function run($url) {

        if ($url == '' || $url == '/') {
            $controller = DEFAULT_CONTROLLER;
            $method = DEFAULT_METHOD;
            $param = null;
        } else {
            $url = trim($url, '/');
            $url = explode('/', $url);

            $controller = ucfirst($url[0]) . 'Controller';
            $method = $url[1] ?? 'index';
            $param = $url[2] ?? null;
        }

        $path = "../app/controllers/$controller.php";

        if (!file_exists($path)) {
            die("Controller <b>$controller</b> tidak ditemukan");
        }

        require_once $path;
        $obj = new $controller();

        if (!method_exists($obj, $method)) {
            die("Method <b>$method</b> tidak ditemukan");
        }

        if ($param !== null) {
            $obj->$method($param);
        } else {
            $obj->$method();
        }
    }
}
