<?php

class ShowCartController extends Controller{
    public function index(){
        $this->loadModel();
        require_once "entity/Cart.class.php";
        $entity = $this->model->findCartPending($this->data);
        $historic = new Cart();
        return $historic->add($entity);
    }
}