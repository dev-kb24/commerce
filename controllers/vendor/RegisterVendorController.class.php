<?php

class RegisterVendorController extends Auth{

    public function index(){
        $this->loadModel();
        require_once "entity/Vendor.class.php";
        if($this->checkEmail()){
            if($this->checkPassword()){
                $lastId = $this->model->addVendor($this->data);
                $entity = $this->model->findById($lastId,"vendor");
                $vendor = new Vendor();
                return $vendor->add($entity);
            }else{
                return Errors::getError(5);
            }
        }else{
            return Errors::getError(4);
        }
    }
}