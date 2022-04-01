<?php
namespace App\Tools;

use ErrorException;
use Exception;
use Throwable;

abstract class VerifData {
    public function __construct(){}

    public static function verifWorkerAdd($data){
        $verifyData= [];
        $errors= [];
        $defaultPicture = "image/worker/default.jpg";
        try {
            $verifyData["last_name"] = self::textControl($data["last_name"],"last_name",null,50);
            $verifyData["first_name"] = self::textControl($data["first_name"],"first_name",null,50);
            $verifyData["sexe"] = self::textControl($data["sexe"],"sexe",null,50);
            $verifyData["phone"] = self::textControl($data["phone"],"phone",null,50);
            $verifyData["mail"] = self::textControl($data["mail"],"mail",null,50);
            $verifyData["specialties"] = self::textControl($data["specialties"],"specialties",null,50);
            $verifyData["upper_id"] = self::intControl($data["upper_id"],"upper_id",0,null,true);
            $verifyData["cabinet_id"] = self::intControl($data["cabinet_id"],"cabinet_id",0,null,true);
            $verifyData["nb_heal_max"] = self::intControl($data["nb_heal_max"],"nb_heal_max",0,null);
            $verifyData["other"] = self::textControl($data["other"],"other",null,500,true);

            $verifyData["date_in"] = self::textControl($data["date_in"],"date_in",null,50);
            $verifyData["date_out"] = self::textControl($data["date_out"],"date_out",null,50,true);

            $verifyData["picture"] = self::pictureControl($data["picture"],$defaultPicture);
        } catch (Exception $error) {
            echo 'Exception reçue : ',  $error->getMessage(), "\n";
        }
        return $verifyData;
    }
    
    public static function textControl($text,$name,$minChar=0,$maxChar=255,$nullable=false){
        if (!isset($text)){
            throw new Exception("Le champ '".$name."'est manquant");
        } else if ( $nullable && ($text === null|| strlen($text) ===0)){
            return null;
        } else if (!$nullable){
            if (!is_string($text)) {
                throw new Exception("Le champ '".$name."' n'est pas une chaine de caractères valide");
            } else if(strlen($text) < $minChar){
                throw new Exception("Le champ '".$name."' est invalide (minimum ".$minChar." caractère requis)");
            } else if (strlen($text) > $maxChar){
                throw new Exception(false,"Le champ '".$name."' est invalide (".$maxChar." caractères maximum)");
            } 
        } 
        return filter_var($text,FILTER_UNSAFE_RAW);
    }
    public static function intControl($number,$name,$minInt=null,$maxInt=null,$nullable=false){
        if (!isset($number)){
            throw new Exception("Le champ '".$name."'est manquant");
        } else if ( $nullable && ($number === "null"|| $number === null)){
            return null;
        } else if (!$nullable){
            if (!intval($number)) {
                throw new Exception("Le champ '".$name."' n'est pas un nombre valide");
            } else if(intval($minInt) && intval($number) < $minInt){
                throw new Exception("Le champ '".$name."' est invalide (nombre inférieur à celui autorisé: $minInt)");
            } else if (intval($maxInt) &&  intval($number) > $maxInt){
                throw new Exception("Le champ '".$name."' est invalide (nombre supérieur à celui autorisé: $minInt)");
            } 
        }
        return intval($number);
    }

    public static function pictureControl($picture,$defaultPicture){
        return $defaultPicture; //flemme#pas le temps ^^
    }
}
