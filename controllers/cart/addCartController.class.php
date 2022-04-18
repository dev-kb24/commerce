<?php

class AddCartController extends Controller{
    public function index(){
        $this->loadModel();
        require_once "entity/Cart.class.php";
        $entity = $this->model->findCart($this->data);
        if(!$entity){
            if($this->model->insertCart($this->data)){
                $c = $this->model->findByID($this->data['id_cart'],'cart');
                $cart = new Cart();
                return $cart->add($c);
            }else{
                return Errors::getError(11);
            }
        }else{
            if($this->model->updateCart($this->data)){
                $c = $this->model->findByID($this->data['id_cart'],'cart');
                $cart = new Cart();
                return $cart->add($c);
            }else{
                return Errors::getError(12);
            } 
        }
    }
}