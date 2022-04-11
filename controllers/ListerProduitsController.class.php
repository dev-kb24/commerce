<?php

class ListerProduitsController extends Controller{
    protected $produits = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Produits.class.php";
        $find = $this->model->findAll();
        foreach ($find as $value) {
            $this->produits[] = new Produits($value['id_produit'],$value['libelle'],$value['content']);
        }
        return $this->produits;
    }
}