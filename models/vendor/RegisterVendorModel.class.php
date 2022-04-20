<?php

class RegisterVendorModel extends Model{

    public function addVendor($data){
        $sqlQuery = 'INSERT into vendor (email,`password`) Values (:email,:pass)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            'email'=>$data['email'],
            'pass'=>password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
        return $this->db->lastInsertId();
    }
}