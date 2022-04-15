<?php

class Auth extends Controller {

    protected function checkEmail(){
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$this->data['email'])){
            return true;
        }else{
            return false;
        }
    }

    protected function checkPassword(){
        if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%-_])[0-9A-Za-z!@#$%-_]{8,15}$/', $this->data['password'])) {
            return true;
        }else{
            return false;
        }
    }

    protected function checkFirstName(){
        if(preg_match('`^[a-zA-Z \'\-\.]+$`', $this->data['firstName']) && strlen($this->data['firstName']) >= 1 && strlen($this->data['firstName']) <= 50){
            return true;
        }else{
            return false;
        }
    }

    protected function checkLastName(){
        if(preg_match('^[a-zA-Z \'\-\.]+$', $this->data['lastName']) && strlen($this->data['lastName']) >= 1 && strlen($this->data['lastName']) <= 50){
            return true;
        }else{
            return false;
        }
    }

    protected function checkAdresse(){
        if(preg_match('^[0-9]+[0-9a-zA-Z \'\-]+$', $this->data['adresse']) && strlen($this->data['adresse']) >= 1 && strlen($this->data['adresse']) <= 150){
            return true;
        }else{
            return false;
        }
    }

    protected function checkCP(){
        if(preg_match('^[a-zA-Z \'\-\.]+$', $this->data['ville']) && strlen($this->data['ville']) >= 1 && strlen($this->data['ville']) <= 100){
            return true;
        }else{
            return false;
        }
    }

    protected function checkVille(){
        if(preg_match('[0-9]{5}', $this->data['cp'])){
            return true;
        }else{
            return false;
        } 
    }

    protected function checkTel(){
        if(preg_match('^[0-9]+$',$this->data['tel']) && strlen($this->data['tel']) != 10){
            return true;
        }else{
            return false;
        }
    }

    protected function checkBirthday(){
        $dt = DateTime::createFromFormat('Y-m-d', $this->data['birthday']);
        return $dt && $dt->format('Y-m-d') === $this->data['birthday'];
    }

}