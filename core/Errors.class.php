<?php

class Errors{

    public static function getError($error){
        switch ($error) {
            case 1:
                return [
                    "error"=>'Erreur dans les données envoyés !'
                ];
                break;
            
            default:
                return [
                    'error'=>"Erreurs"
                ];
                break;
        }
    }
}