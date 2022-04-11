<?php

class ListerProduitsModel extends Model{

    public function findAll(){
        $sqlQuery = 'SELECT * FROM produits';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll();
    }
}