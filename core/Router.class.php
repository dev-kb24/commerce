<?php

class Router {
    private $action;
    private $path;
    private $data;
    public $dispatcher;

    public function parseURL(){
        $url = array_filter(explode('/',$_SERVER['REQUEST_URI']));
        $this->path = $url[3];
        if(isset($url[4])){
            $this->action = $url[4];
        }else{
            $this->action = "index";
        }
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                if(isset($_GET['data'])){
                    $this->data = $_GET['data'];
                }
                break;
            case 'POST':
                if (isset($_POST['data'])) {
                    $this->data = $_POST['data'];
                }
                break;
        }
        $this->dispatcher = new Dispatcher($this->data,$this->action,$this->path);
        $this->render($this->dispatcher->send);
    }

    private function render($array){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($array,JSON_FORCE_OBJECT);
    }

   public function __get($property){
       return $this->$property;
   }
}