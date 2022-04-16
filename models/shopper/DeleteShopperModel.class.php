<?php

class DeleteShopperModel extends Model{

    public function deleteShopper($data){
        $sqlQuery = 'DELETE FROM shopper where id_shopper = :id_shopper';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_shopper"=>$data['id_shopper']
        ]);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}