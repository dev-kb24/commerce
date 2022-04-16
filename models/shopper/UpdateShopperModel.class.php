<?php

class UpdateShopperModel extends Model{
    public function updateShopper($data){
        $sqlQuery = "UPDATE shopper set ";
        $array = [];
        $sqlAdresse = '';
        if(isset($data['adresse'])){
            $sqlAdresse = ",adresse = JSON_SET(adresse,'$.adresse',:adresse,'$.codePostal',:codePostal,'$.ville',:ville)";
        }
        foreach($data as $key =>$value){
            if(!in_array($key,['adresse','codePostal','ville'])){
                $array[] = $key." = :".$key;
            } 
        }
        $sqlQuery .= implode(",",$array).$sqlAdresse." WHERE id_shopper = :id_shopper;";
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute($data);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}