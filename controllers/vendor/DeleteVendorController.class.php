<?php

class DeleteVendorController extends Controller{
    public function index(){
        $this->loadModel();
        require_once "entity/Vendor.class.php";
        if($this->model->deleteVendor($this->data)){
            return ['message'=>"Le compte à bien été supprimé !"];
        }else{
            return Errors::getError(6);
        }
    }
}