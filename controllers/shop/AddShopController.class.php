<?php

class AddShopController extends Controller{
    public function index(){
        $this->loadModel();
        require_once "entity/Shop.class.php";
        $entity = $this->model->findShop($this->data);
        if(!$entity){
            if($this->model->insertShop($this->data)){
                $s = $this->model->findByID($this->data['id_shop'],'shop');
                $shop = new Shop();
                return $shop->add($s);
            }else{
                return Errors::getError(11);
            }
        }else{
            if($this->model->updateShop($this->data)){
                $s = $this->model->findByID($this->data['id_shop'],'shop');
                $shop = new Shop();
                return $shop->add($s);
            }else{
                return Errors::getError(12);
            } 
        }
    }
}