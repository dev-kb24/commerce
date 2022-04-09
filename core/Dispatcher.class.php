<?php
use JSON;
class Dispatcher {
    private $data = [];
    private $acceptAction = ['init'];
    private $action;

    function __construct($action,$data){
        if ($this->checkData($data) && in_array($action,$acceptAction)) {
            $this->action = $action;
            $this->loadRouter();
        }else{
            $this->render(Errors::getError(1));
        }
    }

    private function checkData($data){
        $json = json_decode($data,true,512,JSON_THROW_ON_ERROR);
        if (is_array($json)) {
            $this->data = $json;
            return true;
        }else{
            return false;
        }
    }

    private function loadRouter(){
        require_once 'Router.class.php';
        $router = new Router();
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if (method_exists($router,$method)) {
            $router->$method($this->getAction(),$this->getData());
        }
    }

    public function getData(){
        return $this->data;
    }

    public function getAction(){
        return $this->action;
    }
}