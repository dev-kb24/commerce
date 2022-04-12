<?php

class Entity {

    public function __get($property){
        return $this->$property;
    }

    public function __set($property,$value){
        $this->$property = $value;
    }

    public function add(){
        return array_filter(get_object_vars($this),function($value,$prop){
            return !is_numeric($prop);
        },ARRAY_FILTER_USE_BOTH);
    }
}