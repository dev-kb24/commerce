<?php

class Controller {

    protected $data;
    protected $send;
    protected $model;
    protected $path;

    function __construct($data,$path){
        $this->data = $data;
        $this->path = $path;
    }

    public function loadModel(){
        $nameModel = ucfirst($this->path)."Model";
        $pathModel = "models/".$nameModel.".class.php";
        if(file_exists($pathModel)){
            require_once $pathModel;
            $this->model = new $nameModel(1);
        }
        
    }

    public function getSend(){
        return $this->send;
    }
}