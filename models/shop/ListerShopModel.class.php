<?php

class ListerShopModel extends Model{

    public function findAll(){
        $sqlQuery = 'SELECT * FROM shop';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function findShopFavoris($data){
        $shops = json_decode($data['favoris'],true);
        $sqlQuery = 'SELECT * FROM shop where id_shop in (:id_shop)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_shop"=>implode(",",$shops['shops'])
        ]);
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }
}