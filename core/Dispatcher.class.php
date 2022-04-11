<?php
class Dispatcher{
    private $controller;
    private $action;
    private $path;
    private $data;
    private $send;
    function __construct($data,$action,$path){
        $this->data = $data;
        if ($this->checkData()) {
            $this->loadController();
        }else{
            $this->send = Errors::getError(1);
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
               $this->send = $this->controller->$method();
            }else{
                $this->send = Errors::getError(1);
            }
        }else{
            $this->send = Errors::getError(1);
        }
    }

    public function getSend(){
        return $this->send;
    }

}