<?php  

class HistoricCartModel extends Model{
    public function findHistoric($data){
        $sqlQuery = 'SELECT * FROM cart where id_shopper = :id_shopper and is_valid = 1;';
        $recipesStatement = $this->db->prepare($sqlQuery);
        $recipesStatement->execute(["id_shopper"=>$data['id_shopper']]);
        return $recipesStatement->fetchAll(PDO::FETCH_OBJ);
    }
}