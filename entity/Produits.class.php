<?php

class Produits extends Entity{
    protected $id_produit;
    protected $libelle;
    protected $content;
    protected $prixBase;
    protected $prixSolde;
    protected $quantity;
    protected $colors;
    protected $models;

    function __construct($array){
        foreach($array as $props => $value){
            $this->$props = $value;
        }
    }

    public function addProduit(){
        $produit = [];
        foreach(get_object_vars($this) as $prop => $value){
          if(property_exists($this,$prop) && !is_numeric($prop)){
              $produit[$prop] = $value;
          }
        }
        return $produit;
    }

}