<?php

class VendorShopController extends Controller{
    protected $shops = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Shop.class.php";
        $find = $this->model->findShop($this->data);
        foreach ($find as $entity) {
            $shop = new shop();
            array_push($this->shops,$shop->add($entity));
        }
        return $this->shops;
    }
}