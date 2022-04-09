<?php

class Model extends PDO{

   protected $db;
   protected $orm;
   protected $model;
   
   function __construct($cnx,$orm,$model){
        $this->initPDO($cnx);
        $this->orm = $orm;
        $this->model = $model;
   }

   private function initPDO($case){
      switch ($case) {
         case 1:
            $this->db = new PDO('mysql:dbname=commerce;host=127.0.0.1','root','');
            break;
         
         default:
           
            break;
      }
   }

}