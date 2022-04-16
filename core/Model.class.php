<?php

class Model{

   public $db;
   
   function __construct($cnx){
        $this->initPDO($cnx);
   }

   private function initPDO($case){
      switch ($case) {
         case 1:
            try
            {
               $this->db = new PDO('mysql:host=localhost;dbname=commerce;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                  die('Erreur : '.$e->getMessage());
            }
            
            break;
         
         default:
           
            break;
      }
   }

   public function findByID($id,$from){
      $sqlQuery = 'SELECT * FROM '.$from.' where id_'.$from.' = :id';
      $recipesStatement = $this->db->prepare($sqlQuery);
      $recipesStatement->execute([
         "id"=>$id
      ]);
      return $recipesStatement->fetch(PDO::FETCH_OBJ);
   }

}