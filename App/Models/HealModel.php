<?php
namespace App\Models;

use App\Bdd;
use App\Tools\VerifData;

class HealModel {
    private static $tableName = "heal";
    private static $class = "App\Models\HealModel";
    public function __construct() {}

    public static function getAll() {
        $table = self::$tableName;
        $query = "SELECT * FROM $table";
        return Bdd::query($query,self::$class);
    }
    public static function getOne($id) {
        $table = self::$tableName;
        $sql = "SELECT *
            FROM $table 
            WHERE $table.id=:id
        ";
        $data = array(
            ":id" => $id
        );
        return Bdd::prepare($sql,self::$class,$data,false);
    }
    public static function setAnimal($data): void {
        // $table = self::$tableName;
        // $errorExeption = false;
        // try {
        //     $verifData = VerifData::verifAnimalAdd($data);
        //     $sql= "INSERT INTO $table (name,chip,species,picture,weight,sexe,favorite_healer_id,date_visit,date_birth,date_death,other,owner_id) 
        //     VALUES (:name,:chip,:species,:picture,:weight,:sexe,:favorite_healer_id,:date_visit,:date_birth,:date_death,:other,:owner_id)
        //     ";
        //     $insertData = (array(
        //         ':name' => $verifData["name"],
        //         ':chip' => $verifData["chip"],
        //         ':species' => $verifData["species"],
        //         ':picture' => $verifData["picture"],
        //         ':weight' => $verifData["weight"],
        //         ':sexe' => $verifData["sexe"],
        //         ':favorite_healer_id' => $verifData["favorite_healer_id"],
        //         ':date_visit' => $verifData["date_visit"],
        //         ':date_birth' => $verifData["date_birth"],
        //         ':date_death' => $verifData["date_death"],
        //         ':other' => $verifData["other"],
        //         ':owner_id' => $verifData["owner_id"],
        //     ));
        // } catch (\Exception $error) {
        //     $errorExeption=true;
        //     echo '<div class="error"><p>Erreur reçue : '.$error->getMessage()."</p></div>";
        // }
        // try {
        //     if (!$errorExeption) {
        //         $response = Bdd::prepare(
        //             $sql,
        //             self::$class,
        //             $insertData,
        //             false
        //         );
        //         header("Location: /animal");
        //         exit;
        //     }
        // } catch (\Throwable $th) {
        //     echo '<div class="error"><p>Erreur importante est survenu, Merci de contacter "ElFamosoRéparator-Aurélien"</p></div>';
        // }
    }
    public static function delete($id) {
        $table = self::$tableName;
        $sql = "DELETE FROM $table WHERE id=:id";
        $data = array(
            ":id" => $id
        );
        return Bdd::prepare($sql,self::$class,$data,false);
    }
}