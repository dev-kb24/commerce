<?php

class UpdateVendorModel extends Model{
    public function updateVendor($data){
        $sqlQuery = "UPDATE vendor set ";
        $array = [];
        foreach($data as $key =>$value){
            $array[] = $key." = :".$key;
        }
        $sqlQuery .= implode(",",$array)." WHERE id_vendor = :id_vendor;";
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute($data);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}