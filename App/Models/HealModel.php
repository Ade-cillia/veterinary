<?php
namespace App\Models;

use App\Bdd;
use App\Tools\VerifData;

class HealModel {
    private static $tableName = "heal";
    private static $tableNameSecondary = "treatment";
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
    public static function setHeal($data) {
        $table = self::$tableName;
        $errorExeption = false;
        try {
            $verifData = VerifData::verifHealAdd($data);
            $sql= "INSERT INTO $table (name,date_start,date_end,animal_id,price,payd,room_id,other,finish) 
                VALUES (:name,:date_start,:date_end,:animal_id,:price,:payd,:room_id,:other,:finish)
            ";
            $insertData = (array(
                ':name' => $verifData["name"],
                ':date_start' => $verifData["date_start"],
                ':date_end' => $verifData["date_end"],
                ':animal_id' => $verifData["animal_id"],
                ':price' => $verifData["price"],
                ':payd' => $verifData["payd"],
                ':room_id' => $verifData["room_id"],
                ':other' => $verifData["other"],
                ':finish' => $verifData["finish"],
            ));
        } catch (\Exception $error) {
            $errorExeption=true;
            echo '<div class="error"><p>Erreur reçue : '.$error->getMessage()."</p></div>";
        }
        try {
            if (!$errorExeption) {
                $response = Bdd::prepare(
                    $sql,
                    self::$class,
                    $insertData,
                    false
                );
            }
        } catch (\Throwable $th) {
            echo '<div class="error"><p>Erreur importante est survenu, Merci de contacter "ElFamosoRéparator-Aurélien"</p></div>';
        }
        return Bdd::lastId();
    }
    public static function setTraitment($data,$healId): void {
        $table = self::$tableNameSecondary;
        $errorExeption = false;
        try {
            $verifData = VerifData::verifTreatmentAdd($data);
        } catch (\Exception $error) {
            $errorExeption=true;
            echo '<div class="error"><p>Erreur reçue : '.$error->getMessage()."</p></div>";
        }
        try {
            if (!$errorExeption) {
                foreach ($_POST["healer_selected"] as $key => $value) {
                    $sql= "INSERT INTO $table (worker_id,heal_id) 
                        VALUES (:worker_id,:heal_id)
                    ";
                    $insertData = array(
                        ':worker_id' => $value,
                        ':heal_id' => $healId,
                    );
                    
                    $response = Bdd::prepare(
                        $sql,
                        self::$class,
                        $insertData,
                        false
                    );
                }
               
            }
        } catch (\Throwable $th) {
            echo '<div class="error"><p>Erreur importante est survenu, Merci de contacter "ElFamosoRéparator-Aurélien"</p></div>';
            echo $th;
        }
        
    }
    public static function setHealTreatment($data): void {
        $healId = self::setHeal($data);
        self::setTraitment($data,$healId);
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