<?php
namespace App\Tools;

use DateTime;
use ErrorException;
use Exception;
use Throwable;

abstract class VerifData {
    public function __construct(){}

    public static function verifWorkerAdd(){
        $verifyData= [];
        $defaultPicture = "image/worker/default.png";
        try {
            $verifyData["last_name"] = self::textControl("last_name","Nom",1,50);
            $verifyData["first_name"] = self::textControl("first_name","Prénom",1,50);
            $verifyData["sexe"] = self::textControl("sexe","Sexe",1,50);
            $verifyData["phone"] = self::textControl("phone","Téléphone",1,50);
            $verifyData["mail"] = self::textControl("mail","Email",1,50);

            $verifyData["specialties"] = self::textControl("specialties","Spécialité",1,50);
            $verifyData["upper_id"] = self::intControl("upper_id","Supérieur",0,1,true);
            $verifyData["cabinet_id"] = self::intControl("cabinet_id","Cabinet",0,null,true);
            $verifyData["nb_heal_max"] = self::intControl("nb_heal_max","Nombre de soin max",0,null);

            $verifyData["other"] = self::textControl("other","Autre",0,500,true);

            $verifyData["date_in"] = self::textControl("date_in","Date d'entrée",1,50);
            $verifyData["date_out"] = self::textControl("date_out","Date de sortie",1,50,true);

            $verifyData["picture"] = self::pictureControl("picture",$defaultPicture);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
        return $verifyData;
    }
    public static function verifAnimalAdd(){
        $verifyData= [];
        $defaultPicture = "image/animal/default.png";
        try {
            $verifyData["name"] = self::textControl("name","Nom",1,50);
            $verifyData["chip"] = self::textControl("chip","numéro de puce",1,50);
            $verifyData["species"] = self::textControl("species","Espèce",1,50);
            $verifyData["sexe"] = self::textControl("sexe","Sexe",1,50);

            $verifyData["weight"] = self::intControl("weight","Poids",0,null);
            $verifyData["favorite_healer_id"] = self::intControl("favorite_healer_id","Soigneur favoris",0,null,true);
            $verifyData["owner_id"] = self::intControl("owner_id","Propriétaire",0,255);
            
            $verifyData["date_visit"] = self::textControl("date_visit","Date de Première visite");
            $verifyData["date_birth"] = self::textControl("date_birth","Date de naissance");
            $verifyData["date_death"] = self::textControl("date_death","Date de décès",1,255,true);

            $verifyData["other"] = self::textControl("other","Autre",0,500,true);

           
            $verifyData["picture"] = self::pictureControl("picture",$defaultPicture);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
        return $verifyData;
    }
    public static function verifOwnerAdd(){
        $verifyData= [];
        $verifyData["last_name"] = self::textControl("last_name","Nom",1,50);
        $verifyData["first_name"] = self::textControl("first_name","Prénom",1,50);
        $verifyData["phone"] = self::textControl("phone","Téléphone",1,50);
        $verifyData["mail"] = self::textControl("mail","Email",1,50);
        $verifyData["adress"] = self::textControl("adress","Adresse",1,255);

        $verifyData["other"] = self::textControl("other","Autre",0,500,true);
        try {
            
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
        return $verifyData;
    }


    public static function textControl($inputName,$name,$minChar=1,$maxChar=255,$nullable=false){
        if (!isset($_POST[$inputName])){
            throw new Exception("Le champ '".$name."'est manquant");
        } else if ( $nullable && ($_POST[$inputName] === null|| strlen($_POST[$inputName]) ===0)){
            return null;
        } else if (!$nullable){
            if (!is_string($_POST[$inputName])) {
                throw new Exception("Le champ '".$name."' n'est pas une chaine de caractères valide");
            } else if(strlen($_POST[$inputName]) < $minChar){
                throw new Exception("Le champ '".$name."' est invalide (minimum ".$minChar." caractère requis)");
            } else if (strlen($_POST[$inputName]) > $maxChar){
                throw new Exception("Le champ '".$name."' est invalide (".$maxChar." caractères maximum)");
            } 
        } 
            return filter_var($_POST[$inputName],FILTER_UNSAFE_RAW);
        }
    public static function intControl($inputName,$name,$minInt=null,$maxInt=null,$nullable=false){
        if (!isset($_POST[$inputName])){
            throw new Exception("Le champ '".$name."'est manquant");
        } else if ( $nullable && ($_POST[$inputName] === "null"|| $_POST[$inputName] === null)){
            return null;
        } else if (!$nullable){
            if (!intval($_POST[$inputName])) {
                throw new Exception("Le champ '".$name."' n'est pas un nombre valide");
            } else if(intval($minInt) && intval($_POST[$inputName]) < $minInt){
                throw new Exception("Le champ '".$name."' est invalide (nombre inférieur à celui autorisé: $minInt)");
            } else if (intval($maxInt) &&  intval($_POST[$inputName]) > $maxInt){
                throw new Exception("Le champ '".$name."' est invalide (nombre supérieur à celui autorisé: $minInt)");
            } 
        }
        return intval($_POST[$inputName]);
    }

    public static function pictureControl($picture,$defaultPicture){
        return $defaultPicture; //flemme#pas le temps ^^
    }
}
