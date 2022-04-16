<?php

class RegisterShopperModel extends Model{

    public function addShopper($data){
        $sqlQuery = 'INSERT into shopper (firstName,lastName,email,`password`,`role`) Values (:firstName,:lastName,:email,:pass,:role)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            'firstName'=>$data['firstName'],
            'lastName'=>$data['lastName'],
            'email'=>$data['email'],
            'pass'=>password_hash($data['password'], PASSWORD_DEFAULT),
            'role'=>json_encode(['ROLE_SHOPPER'])
        ]);
        return $this->db->lastInsertId();
    }
}