<?php

class ListerProduitsController extends Controller{
    protected $produits = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Produits.class.php";
        $find = $this->model->findAll();
        foreach ($find as $value) {
            $produit = new Produits($value);
            array_push($this->produits,$produit->addProduit()); 
        }
        return $this->produits;
    }
}