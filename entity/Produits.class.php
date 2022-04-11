<?php

class Produits {
    public $id;
    public $libelle;
    public $content;

    function __construct($id,$libelle,$content){
        $this->id = $id;
        $this->libelle = $libelle;
        $this->content = $content;
    }
}