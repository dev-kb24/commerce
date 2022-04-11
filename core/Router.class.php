<?php

class Router {
    protected $action;
    protected $path;
    protected $data;

    function __construct(){
       $this->parseURL();
    }

    private function parseURL(){
        $url = array_filter(explode('/',$_SERVER['REQUEST_URI']));
        $this->path = $url[0];
        if(isset($url[1])){
            $this->action = $url[1];
        }else{
            $this->action = "index";
        }
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $this->data = $_GET['data'];
                break;
            case 'POST':
                $this->data = $_POST['data'];
                break;
        }
    }

    protected function render($array){
        echo json_encode($array);
    }

    public function getData(){
        return $this->data;
    }

    public function getAction(){
        return $this->action;
    }
}