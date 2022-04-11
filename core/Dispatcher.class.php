<?php
class Dispatcher extends Router{
    protected $controller;
    function __construct(){
        if ($this->checkData()) {
            $this->loadController();
        }else{
            $this->render(Errors::getError(1));
        }
    }

    private function checkData(){
        $json = json_decode($this->data,true,512,JSON_THROW_ON_ERROR);
        if (is_array($json)) {
            $this->data = $json;
            return true;
        }else{
            return false;
        }
    }

    private function loadController(){
        $nameController = ucfirst($this->path)."Controller";
        $pathController = "../controllers/".$nameController.".class.php";
        if(file_exists($pathController)){
            require_once $pathController;
            $this->controller = new $nameController($this->getData());
            $method = $this->action;
            if(method_exists($this->controller,$method)){
                $this->controller->$method();
                $this->render($this->controller->getSend());
            }else{
                $this->render(Errors::getError(1));
            }
        }else{
            $this->render(Errors::getError(1));
        }
    }

}