<?php

class ListerShopController extends Controller{
    protected $shops = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Shop.class.php";
        $find = $this->model->findAll();
        foreach ($find as $entity) {
            $shop = new Shop();
            foreach($entity as $prop => $val){
                $shop->$prop = $val;
            }
            array_push($this->shops,$shop->add()); 
        }
        return $this->shops;
    }
}