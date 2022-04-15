<?php

class AddShopperModel extends Model{

    public function addShopper($data){
        $sqlQuery = 'INSERT into shopper (firstName,lastName,email,`password`) Values (:firstName,:lastName,:email,:pass)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            'firstName'=>$data['firstName'],
            'lastName'=>$data['lastName'],
            'email'=>$data['email'],
            'pass'=>password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
        return $this->db->lastInsertId();
    }

    public function findById($id){
        $sqlQuery = 'SELECT * FROM shopper where id_shopper = :id_shopper';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_shopper"=>$id
        ]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }
}