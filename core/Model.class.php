<?php

class Model{

   protected $cnx;
   protected $orm;
   protected $model;
   
   function __construct($cnx,$orm,$model){
        $this->cnx = $cnx;
        $this->orm = $orm;
        $this->model = $model;
   }

}