<?php
class Dispatcher{
    private $controller;
    private $folder;
    private $action;
    private $path;
    private $data;
    private $send;
    private $responseCode;
    function __construct($data,$action,$path){
        $this->data = $data;
        $this->action = $action;
        $this->path = $path;
        if (!empty($this->data)) {
            if ($this->checkData()) {
                $this->loadController();
            }else{
                $this->send = Errors::getError(1);
                $this->responseCode = "HTTP/1.0 404 Not Found";
            }
        }else{
            $this->loadController();
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
        $this->addFolder();
        $nameController = ucfirst($this->path)."Controller";
        $pathController = "controllers/".$this->folder."/".$nameController.".class.php";
        if(file_exists($pathController)){
            require_once $pathController;
            $this->controller = new $nameController($this->data,$this->path,$this->folder);
            $method = $this->action;
            if(method_exists($this->controller,$method)){
               $this->send = $this->controller->$method();
               $this->responseCode = "HTTP/1.0 200 OK";
            }else{
                $this->send = Errors::getError(3);
                $this->responseCode = "HTTP/1.0 404 Not Found";
            }
        }else{
            $this->send = Errors::getError(2);
            $this->responseCode = "HTTP/1.0 404 Not found";
        }
    }

    private function addFolder(){
        $parts = preg_split('/(?=[A-Z])/', $this->path);
        $this->folder = strtolower($parts[1]);
    }

    public function __get($property){
        return $this->$property;
    }

}