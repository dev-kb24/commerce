<?php  

class ShowCartModel extends Model{
    public function findCartPending($data){
        $sqlQuery = 'SELECT * FROM cart where id_shopper = :id_shopper and pending = 1;';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute(["id_shopper"=>$data['id_shopper']]);
        return $recipesStatement->fetch(PDO::FETCH_OBJ);
    }
}