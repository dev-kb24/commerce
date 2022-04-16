<?php

class ListProductModel extends Model{

    public function findAll(){
        $sqlQuery = 'SELECT * FROM product';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }
}