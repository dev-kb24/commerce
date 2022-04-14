<?php

class ListerProduitsController extends Controller{
    protected $produits = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Produits.class.php";
        $find = $this->model->findAll();
        foreach ($find as $entity) {
            $produit = new Produits();
            array_push($this->produits,$produit->add($entity));
        }
        return $this->produits;
    }

    public function findById(){
        $this->loadModel();
        require_once "entity/Produits.class.php";
        $find = $this->model->findById($this->data);
        foreach ($find as $entity) {
            $produit = new Produits();
            foreach($entity as $prop => $val){
                $produit->$prop = $val;
            }
            array_push($this->produits,$produit->add()); 
        }
        return $this->produits;
    }
}