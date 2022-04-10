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

            $verifyData["picture"] = self::pictureControl("picture","worker",$defaultPicture);
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

           
            $verifyData["picture"] = self::pictureControl("picture","animal",$defaultPicture);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
        return $verifyData;
    }
    public static function verifOwnerAdd(){
        $verifyData= [];
 
        try {
            $verifyData["last_name"] = self::textControl("last_name","Nom",1,50);
            $verifyData["first_name"] = self::textControl("first_name","Prénom",1,50);
            $verifyData["phone"] = self::textControl("phone","Téléphone",1,50);
            $verifyData["mail"] = self::textControl("mail","Email",1,50);
            $verifyData["adress"] = self::textControl("adress","Adresse",1,255);
    
            $verifyData["other"] = self::textControl("other","Autre",0,500,true);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
        return $verifyData;
    }
    public static function verifHealAdd(){
        $verifyData= [];
        try {
            $verifyData["name"] = self::textControl("name","Nom",1,50);

            $verifyData["date_start"] = self::textControl("date_start","Date-heure de début",1,100);
            $verifyData["date_end"] = self::textControl("date_end","Date-heure de fin",1,100);
    
            $verifyData["price"] = self::intControl("price","Prix",0,null);
            $verifyData["room_id"] = self::intControl("room_id","Salle utilisé",0,null);
            $verifyData["animal_id"] = self::intControl("animal_id","Animal",0,null);
    
            $verifyData["payd"] = self::boolControl("payd","Soin payé");
            $verifyData["finish"] = self::boolControl("finish","Soin finit");
    
            $verifyData["other"] = self::textControl("other","Autre",0,500,true);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
        return $verifyData;
    }
    public static function verifTreatmentAdd(){
        $verifyData= [];
        if (!isset($_POST["healer_selected"])){
            throw new Exception("Aucun soigneur séléctionné");
        }
        return $_POST["healer_selected"];
    }
    





    // CONTROL DATA //


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
    public static function boolControl($inputName,$name){
        if (!isset($_POST[$inputName])){
            throw new Exception("Le champ '".$name."'est manquant");
        }
        $bool = filter_var($_POST[$inputName],FILTER_VALIDATE_BOOLEAN);
        if ($bool) {
            $bool=1;
        } else {
            $bool=0;
        }
        return $bool;
    }

    public static function pictureControl($picture,$file,$defaultPicture){
        if (isset($_FILES[$picture])) {
            $link = $_FILES[$picture]["tmp_name"];  
            $destdir = "./public/assets/image/$file/".filter_var($_FILES[$picture]["name"],FILTER_UNSAFE_RAW);
            $img=file_get_contents($link);
            file_put_contents($destdir,$img);
            return "image/$file/".filter_var($_FILES[$picture]["name"],FILTER_UNSAFE_RAW);
        } else {
            return $defaultPicture;
        } 
    }
    public static function dateTimeControl($inputName,$name){
        //-----------------PAS LE TEMPS DE FINIR-------------------------------------------------------------//
        
        // if (!isset($_POST[$inputName])){
        //     throw new Exception("Le champ '".$name."'est manquant");
        // }
        //$date = date_parse($_POST[$inputName]);
        // $checkDate = (
        //     $date['error_count'] == 0 && checkdateTime(
        //         $date['month'],
        //         $date['day'],
        //         $date['year'],
        //         $date['hour'],
        //         $date['minute'],
        //         $date['second']
        //     )
        // );
        // $format = "Y-m-dTH:M";
        // $date = DateTime::createFromFormat($format, $_POST[$inputName]);
        // var_dump($date);
        // var_dump($_POST[$inputName]);
        // if (!($date && $date->format($format) == $_POST[$inputName])) {
        //     # code...
        // }
        // if ($checkDate){
        //     throw new Exception("Le champ '".$name."' est une date-heure non valide");
        // }
        // return $_POST[$inputName];
    }
   
}
