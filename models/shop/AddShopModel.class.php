<?php

class AddShopModel extends Model{

    public function findShop($data){
        $sqlQuery = "SELECT * FROM shop WHERE id_shop = :id_shop";
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_shop"=>$data['id_shop']
        ]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }

    public function updateShop($data){
        $sqlQuery = "UPDATE shop set ";
        $array = [];
        foreach($data as $key =>$value){
            $array[] = $key." = :".$key; 
        }
        $sqlQuery .= implode(",",$array)." WHERE id_shop = :id_shop;";
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute($data);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    // public function insertShop($data){
    //     $sqlQuery = 'INSERT INTO cart (product,id_shopper,date_cart,is_valid,pending) VALUES (:product,:id_shopper,:date_cart,:is_valid,:pending)';
    //     $recipesStatement = $this->db->prepare($sqlQuery);
    //     $recipesStatement->execute([
    //         "product"=>json_encode($data['product']),
    //         "id_shopper"=>$data['id_shopper'],
    //         "date_cart"=>date("Y-m-d"),
    //         "is_valid"=>0,
    //         "pending"=>1
    //     ]);
    //     if($recipesStatement->rowCount() > 0){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}