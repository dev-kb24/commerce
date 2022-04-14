<?php

class ShopperConnexionModel extends Model{

    public function findShopper($email,$password){
        $sqlQuery = 'SELECT * FROM shopper where email = :email and password = :password';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "email"=>$email,
            "password"=>$password
        ]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }
}