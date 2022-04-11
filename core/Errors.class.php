<?php

class Errors{

    public static function getError($error){
        switch ($error) {
            case 1:
                return [
                    "error"=>'Erreur dans les données envoyés !'
                ];
                break;

            case 2: 
                return [
                    "error"=>"Le fichier n'existe pas!"
                ];
                break;

            case 3: 
                return [
                    "error"=>"La méthode n'existe pas!"
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