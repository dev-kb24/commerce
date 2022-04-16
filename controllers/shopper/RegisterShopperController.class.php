<?php

class RegisterShopperController extends Auth{

    public function index(){
        $this->loadModel();
        require_once "entity/Shopper.class.php";
        if($this->checkEmail()){
            if($this->checkPassword()){
                $lastId = $this->model->addShopper($this->data);
                $entity = $this->model->findById($lastId,"shopper");
                $shopper = new Shopper();
                return $shopper->add($entity);
            }else{
                return Errors::getError(5);
            }
        }else{
            return Errors::getError(4);
        }
    }
}