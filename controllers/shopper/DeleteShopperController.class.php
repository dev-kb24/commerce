<?php

class DeleteShopperController extends Controller{
    public function index(){
        $this->loadModel();
        require_once "entity/Shopper.class.php";
        if($this->model->deleteShopper($this->data)){
            return ['message'=>"Le compte à bien été supprimé !"];
        }else{
            return Errors::getError(6);
        }
    }
}