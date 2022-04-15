<?php

class Auth extends Controller {

    protected function checkEmail(){
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$this->data['email'])){
            return true;
        }else{
            return false;
        }
    }

}