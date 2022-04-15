<?php

class ListerShopModel extends Model{

    public function findAll(){
        $sqlQuery = 'SELECT * FROM shop';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll();
    }
}