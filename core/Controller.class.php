<?php

class Controller {

    protected $data;
    protected $model;

    function __construct($data){
        $this->data = $data;
    }

    public function loadModel(){
        $mod = ucfirst($this->action)."Model.class.php";
        require_once $mod;
        $this->model = new $mod();
    }
}