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

            case 4:
                return [
                    "error"=>"L'email n'est pas valide"
                ];
                break;

            case 5:
                return [
                    "error"=>"Le password n'est pas correct"
                ];
                 break;

            case 6:
                return [
                    "error"=>"Le compte n'a pas été supprimé !"
                ];
                break;

             case 7:
                return [
                    "error"=>"Les données utilisateur ne sont pas correct"
                ];
                break;

            case 8:
                return [
                    "error"=>"Aucunes modifications !"
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