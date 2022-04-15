<?php

class ConnexionShopperModel extends Model{

    public function findShopper($email){
        $sqlQuery = 'SELECT * FROM shopper where email = :email';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "email"=>$email,
        ]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }
}