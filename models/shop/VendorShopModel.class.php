<?php  

class VendorShopModel extends Model {
    
    public function findShop($data){
        $sqlQuery = 'SELECT * FROM shop where id_shop in (:id_shop)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_shop"=>implode(',',$data['id_shop'])
        ]);
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }
}