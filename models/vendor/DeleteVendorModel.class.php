<?php

class DeleteVendorModel extends Model{

    public function deleteVendor($data){
        $id_shop = json_decode($this->findShop($data),true);
        if($this->deleteShop($id_shop)){
            $sqlQuery = 'DELETE FROM vendor where id_vendor = :id_vendor';
            $recipesStatement = $this->db->prepare($sqlQuery);
            $recipesStatement->execute([
                "id_vendor"=>$data['id_vendor']
            ]);
            if($recipesStatement->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    private function findShop($data){
        $sqlQuery = 'select id_shop from vendor where id_vendor = :id_vendor';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_vendor"=>$data['id_vendor']
        ]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }

    private function deleteShop($id_shop){
        $sqlQuery = 'DELETE FROM shop where id_shop in (:id_shop)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_shop"=>implode(',',$id_shop)
        ]);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}