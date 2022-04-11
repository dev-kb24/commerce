<?php

class Controller {

    protected $data;
    protected $send;
    protected $model;

    function __construct($data){
        $this->data = $data;
    }

    public function loadModel(){
        $mod = ucfirst($this->action)."Model.class.php";
        require_once $mod;
        $this->model = new $mod();
    }

    public function getSend(){
        return $this->send;
    }
}