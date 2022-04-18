<?php

class AddCartModel extends Model{

    public function findCart($data){
        $sqlQuery = "SELECT * FROM cart WHERE id_cart = :id_cart";
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "id_cart"=>$data['id_cart']
        ]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }

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
        $sqlQuery = 'INSERT INTO cart (product,id_shopper,date_cart,is_valid,pending) VALUES (:product,:id_shopper,:date_cart,:is_valid,:pending)';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute([
            "product"=>json_encode($data['product']),
            "id_shopper"=>$data['id_shopper'],
            "date_cart"=>date("Y-m-d"),
            "is_valid"=>0,
            "pending"=>1
        ]);
        if($recipesStatement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}