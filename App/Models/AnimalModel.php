<?php
namespace App\Models;

use App\Bdd;
use App\Tools\VerifData;
use App\Classes\AnimalClasse;

abstract class AnimalModel extends Model{
    protected static $tableName = "animal";
    protected static $class = AnimalClasse::class;
    
    public static function getAll() {
        $table = self::$tableName;
        $query = "SELECT $table.*,
        owner.last_name AS owner_last_name,owner.first_name AS owner_first_name,owner.phone AS owner_phone
        FROM $table 
        LEFT JOIN owner ON owner.id=$table.owner_id";
        return Bdd::query($query,self::$class);
    }
    public static function getOne($id) {
        $table = self::$tableName;
        $sql = "SELECT $table.*,
            favorite_worker.last_name AS favorite_worker_last_name,favorite_worker.first_name AS favorite_worker_first_name,
            owner.last_name AS owner_last_name,owner.first_name AS owner_first_name,owner.phone AS owner_phone,owner.mail AS owner_mail
            FROM $table 
            LEFT JOIN worker favorite_worker ON $table.favorite_healer_id=favorite_worker.id
            LEFT JOIN owner ON owner.id=$table.owner_id
            WHERE $table.id=:id
        ";
        $data = array(
            ":id" => $id
        );
        return Bdd::prepare($sql,self::$class,$data,false);
    }
    public static function setAnimal($data): void {
        $table = self::$tableName;
        $errorExeption = false;
        try {
            $verifData = VerifData::verifAnimalAdd($data);
            $sql= "INSERT INTO $table (name,chip,species,picture,weight,sexe,favorite_healer_id,date_visit,date_birth,date_death,other,owner_id) 
            VALUES (:name,:chip,:species,:picture,:weight,:sexe,:favorite_healer_id,:date_visit,:date_birth,:date_death,:other,:owner_id)
            ";
            $insertData = (array(
                ':name' => $verifData["name"],
                ':chip' => $verifData["chip"],
                ':species' => $verifData["species"],
                ':picture' => $verifData["picture"],
                ':weight' => $verifData["weight"],
                ':sexe' => $verifData["sexe"],
                ':favorite_healer_id' => $verifData["favorite_healer_id"],
                ':date_visit' => $verifData["date_visit"],
                ':date_birth' => $verifData["date_birth"],
                ':date_death' => $verifData["date_death"],
                ':other' => $verifData["other"],
                ':owner_id' => $verifData["owner_id"],
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
                header("Location: /animal");
                exit;
            }
        } catch (\Throwable $th) {
            echo '<div class="error"><p>Erreur importante est survenu, Merci de contacter "ElFamosoRéparator-Aurélien"</p></div>';
        }
    }
    public static function delete($id) {
        $table = self::$tableName;
        $sql = "DELETE FROM $table WHERE id=:id";
        $data = array(
            ":id" => $id
        );
        return Bdd::prepare($sql,self::$class,$data,false);
    }
    public static function getAllForOneOwner($ownerId){
        $table = self::$tableName;
        $sql = "SELECT *
            FROM $table 
            WHERE $table.owner_id=:ownerId
        ";
        $data = array(
            ":ownerId" => $ownerId
        );
        return Bdd::prepare($sql,self::$class,$data,true);
    }
}