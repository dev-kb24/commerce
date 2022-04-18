<?php

class ListerVendorModel extends Model{

    public function findAll(){
        $sqlQuery = 'SELECT * FROM vendor';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function findVendorFavoris($data){
        $vendors = json_decode($data['favoris'],true);
        $sqlQuery = 'SELECT * FROM vendor where id_vendor in (:id_vendor)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_vendor"=>implode(",",$vendors['vendors'])
        ]);
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }
}