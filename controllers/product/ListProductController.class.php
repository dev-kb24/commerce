<?php

class ListProductController extends Controller{
    protected $produits = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Product.class.php";
        $find = $this->model->findAll();
        foreach ($find as $entity) {
            $produit = new Product();
            array_push($this->produits,$produit->add($entity));
        }
        return $this->produits;
    }

    public function findById(){
        $this->loadModel();
        require_once "entity/Product.class.php";
        $find = $this->model->findById($this->data);
        foreach ($find as $entity) {
            $produit = new Product();
            array_push($this->produits,$produit->add($entity));
        }
        return $this->produits;
    }
}