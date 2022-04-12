<?php

class ListerProduitsController extends Controller{
    protected $produits = [];
    public function index(){
        $this->loadModel();
        require_once "entity/Produits.class.php";
        $find = $this->model->findAll();
        foreach ($find as $value) {
            $produit = new Produits($value['id_produit'],$value['libelle'],$value['content']);
            array_push($this->produits,[
                "id"=>$produit->id,
                "libelle"=>$produit->libelle,
                "content"=>$produit->content
            ]); 
        }
        return $this->produits;
    }
}