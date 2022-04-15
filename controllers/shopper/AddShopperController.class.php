<?php

class AddShopperController extends Auth{

    public function index(){
        $this->loadModel();
        require_once "entity/Shopper.class.php";
        if($this->checkEmail()){
            $lastId = $this->model->addShopper($this->data);
            $entity = $this->model->findById($lastId);
            $shopper = new Shopper();
            return $shopper->add($entity);
        }else{
            return Errors::getError(4);
        }
    }
}