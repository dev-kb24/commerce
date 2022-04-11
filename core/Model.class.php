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

}