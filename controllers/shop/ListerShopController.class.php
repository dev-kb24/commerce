<?php

class ListerShopController extends Controller{
    protected $shops = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Shop.class.php";
        $find = $this->model->findAll();
        foreach ($find as $entity) {
            $shop = new Shop();
            array_push($this->shops,$shop->add($entity));
        }
        return $this->shops;
    }
}