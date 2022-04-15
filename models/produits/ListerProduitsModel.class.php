<?php

class ListerProduitsModel extends Model{

    public function findAll(){
        $sqlQuery = 'SELECT * FROM produits';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($ids){
        $sqlQuery = 'SELECT * FROM produits where id_produit in ('.implode(",",$ids).')';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll();
    }
}