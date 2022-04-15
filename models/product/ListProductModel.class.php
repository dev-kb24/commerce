<?php

class ListProductModel extends Model{

    public function findAll(){
        $sqlQuery = 'SELECT * FROM product';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($ids){
        $sqlQuery = 'SELECT * FROM product where id_product in ('.implode(",",$ids).')';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll();
    }
}