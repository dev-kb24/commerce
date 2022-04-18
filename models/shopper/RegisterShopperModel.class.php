<?php

class RegisterShopperModel extends Model{

    public function addShopper($data){
        $sqlQuery = 'INSERT into shopper (firstName,lastName,email,`password`,`role`,adresse,favoris) Values (:firstName,:lastName,:email,:pass,:role,:adresse,:favoris)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            'firstName'=>$data['firstName'],
            'lastName'=>$data['lastName'],
            'email'=>$data['email'],
            'pass'=>password_hash($data['password'], PASSWORD_DEFAULT),
            'role'=>json_encode(['ROLE_SHOPPER']),
            'adresse'=>json_encode(["adresse"=>"","codePostal"=>"","ville"=>""]),
            'favoris'=>json_encode(['shops'=>[],'vendors'=>[]])
        ]);
        return $this->db->lastInsertId();
    }
}