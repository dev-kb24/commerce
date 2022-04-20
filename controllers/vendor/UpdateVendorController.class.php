<?php

class UpdateVendorController extends Auth {
    public function index(){
        $this->loadModel();
        require_once "entity/Vendor.class.php";
        $isValid = true;
        foreach($this->data as $key => $value){
            if(!in_array($key,['id_shop',"id_vendor"])){
                $var = 'check'.ucfirst($key);
                if(!$this->$var()){
                   $isValid = false;
                }
            }
        }
        if($isValid){
            if($this->model->updateVendor($this->data)){
                $u = $this->model->findById($this->data['id_vendor'],'vendor');
                $vendor = new Vendor();
                return $vendor->add($u);
            }else{
                return Errors::getError(8);
            }
        }else{
            return Errors::getError(7);
        }
    }
}