<?php

class HistoricCartController extends Controller{
    protected $historics;
    public function index(){
        $this->loadModel();
        require_once "entity/Cart.class.php";
        $find = $this->model->findHistoric($this->data);
        foreach ($find as $entity) {
            $historic = new Cart();
            array_push($this->historics,$historic->add($entity));
        }
        return $this->historics;
    }
    
}