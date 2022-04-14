<?php

class Entity {

    public function __get($property){
        return $this->$property;
    }

    public function __set($property,$value){
        $this->$property = $value;
    }

    public function __clone(){

    }

    public function add($obj){
        foreach($obj as $prop => $value){
            $this->$prop = $value;
        }
        return $this;
    }
}