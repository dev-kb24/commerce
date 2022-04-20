<?php

class ConnectionVendorModel extends Model{

    public function findVendor($email){
        $sqlQuery = 'SELECT * FROM shopper where email = :email';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "email"=>$email,
        ]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }
}