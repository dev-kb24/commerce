<?php

class UpdateShopperController extends Auth {
    public function index(){
        $this->loadModel();
        require_once "entity/Shopper.class.php";
        $isValid = true;
        foreach($this->data as $key => $value){
            if($key != "id_shopper"){
                $var = 'check'.ucfirst($key);
                if(!$this->$var()){
                   $isValid = false;
                }
            }
        }
        if($isValid){
            if($this->model->updateShopper($this->data)){
                $u = $this->model->findById($this->data['id_shopper'],'shopper');
                $shopper = new Shopper();
                return $shopper->add($u);
            }else{
                return Errors::getError(8);
            }
        }else{
            return Errors::getError(7);
        }
    }
}