<?php

class ListerVendorController extends Controller{
    protected $vendors = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Vendor.class.php";
        if(isset($this->data['favoris'])){
            $find = $this->model->findVendorFavoris($this->data);
            foreach ($find as $entity) {
                $vendor = new vendor();
                array_push($this->vendors,$vendor->add($entity));
            }
        }else{
            $find = $this->model->findAll();
            foreach ($find as $entity) {
                $vendor = new vendor();
                array_push($this->vendors,$vendor->add($entity));
            }
        }
        return $this->vendors;
    }
}