<?php
use JSON;
class Router {
    public function get($action,$data){
        $cont = ucfirst($action)."Controller.class.php";
        require_once $cont;
        $controller = new $cont($data);
        if (method_exists($controller,'render')) {
            $controller->render();
        }
    }

    public function post($action,$data){
        $cont = ucfirst($action)."Controller.class.php";
        require_once $cont;
        $controller = new $cont($data);
        if (method_exists($controller,'render')) {
            $this->render($controller->render());
        }
    }
}