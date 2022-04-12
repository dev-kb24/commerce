<?php

class Produits extends Entity{
    protected $id;
    protected $libelle;
    protected $content;

    function __construct($id,$libelle,$content){
        $this->id = $id;
        $this->libelle = $libelle;
        $this->content = $content;
    }

}