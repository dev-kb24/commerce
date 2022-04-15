<?php

class Controller {

    protected $data;
    protected $send;
    protected $model;
    protected $path;
    protected $folder;

    function __construct($data,$path,$folder){
        $this->data = $data;
        $this->path = $path;
        $this->folder = $folder;
    }

    public function loadModel(){
        $nameModel = ucfirst($this->path)."Model";
        $pathModel = "models/".$this->folder."/".$nameModel.".class.php";
        if(file_exists($pathModel)){
            require_once $pathModel;
            $this->model = new $nameModel(1);
        }
        
    }

    public function __get($property){
        return $this->$property;
    }
}