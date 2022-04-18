<?php

class UpdateCartModel extends Model{
    public function updateCart($data){
        $sqlQuery = "UPDATE cart set ";
        $array = [];
        foreach($data as $key =>$value){
            $array[] = $key." = :".$key; 
        }
        $sqlQuery .= implode(",",$array)." WHERE id_cart = :id_cart;";
        $recipesStatement = $this->db->prepare($sqlQuery);
        $data['product'] = json_encode($data['product']);
        $recipesStatement->execute($data);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function insertCart($data){
        $sqlQuery = 'DELETE FROM cart where id_shopper = :id_cart';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_cart"=>$data['id_cart']
        ]);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}