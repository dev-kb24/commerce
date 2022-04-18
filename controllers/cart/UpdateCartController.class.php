<?php

class UpdateCartController extends Controller{
    public function index(){
        $this->loadModel();
        require_once "entity/Cart.class.php";
        if(empty($this->data['product'])){
            return $this->deleteCart();
        }else{
            return $this->updateCart();
        }
    }

    private function deleteCart(){
        if($this->model->deleteCart($this->data)){
            return ['message'=>"Le panier à bien été supprimé !"];
        }else{
            return Errors::getError(10); 
        }
    }

    private function updateCart(){
        if($this->model->updateCart($this->data)){
            $c = $this->model->findById($this->data['id_cart'],'cart');
            $cart = new Cart();
            return $cart->add($c);
        }else{
            return Errors::getError(9);
        }
    }
}