<?php
namespace App\Models;

use App\Bdd;
use App\Classes\WorkerClasse;
use App\Tools\VerifData;

abstract class WorkerModel extends Model{
    protected static $tableName = "worker";
    protected static $tableNameSecondary = "treatment";
    protected static $class = WorkerClasse::class;
    public function __construct() {}

    
    public static function setWorker($data): void {
        $table = self::$tableName;
        $errorExeption = false;
        try {
            $verifData = VerifData::verifWorkerAdd($data);
            $sql= "INSERT INTO $table (upper_id,last_name,first_name,date_in,sexe,phone,mail,picture,specialties,nb_heal_max,date_out,other,cabinet_id) VALUES (:upper_id,:last_name,:first_name,:date_in,:sexe,:phone,:mail,:picture,:specialties,:nb_heal_max,:date_out,:other,:cabinet_id)";
            $insertData = (array(
                ':upper_id' => $verifData["upper_id"],
                ':last_name' => $verifData["last_name"],
                ':first_name' => $verifData["first_name"],
                ':date_in' => $verifData["date_in"],
                ':sexe' => $verifData["sexe"],
                ':phone' => $verifData["phone"],
                ':mail' => $verifData["mail"],
                ':picture' => $verifData["picture"],
                ':specialties' => $verifData["specialties"],
                ':nb_heal_max' => $verifData["nb_heal_max"],
                ':date_out' => $verifData["date_out"],
                ':other' => $verifData["other"],
                ':cabinet_id' => $verifData["cabinet_id"],
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
                header("Location: /worker");
                exit;
            }
        } catch (\Throwable $th) {
            echo '<div class="error"><p>Erreur importante est survenu, Merci de contacter "ElFamosoRéparator-Aurélien"</p></div>';
        }
    }
    public static function getAll() {
        $table = self::$tableName;
        $query = "SELECT $table.*,ca.name AS cabinet_name
            FROM $table AS $table 
            LEFT JOIN cabinet ca 
            ON worker.cabinet_id=ca.id
        ";
        return Bdd::query($query,self::$class);
    }
    public static function getOne($id) {
        $table = self::$tableName;
        $sql = "SELECT $table.*,
            ca.name AS cabinet_name,ca.adress AS cabinet_adress,ca.phone AS cabinet_phone,
            upp.last_name AS upper_last_name,upp.first_name AS upper_first_name
            FROM $table AS $table
            LEFT JOIN cabinet ca 
            ON $table.cabinet_id=ca.id
            LEFT JOIN $table upp 
            ON $table.upper_id=upp.id
            WHERE $table.id=:id
        ";
        $data = array(
            ":id" => $id
        );
        return Bdd::prepare($sql,self::$class,$data,false);
    }
    public static function getAllForHeal($idheal) {
        $table = self::$tableName;
        $tableNameSecondary = self::$tableNameSecondary;
        $sql = "SELECT $table.* FROM $table
        INNER JOIN $tableNameSecondary ON $tableNameSecondary.worker_id=$table.id
        WHERE $tableNameSecondary.heal_id=:id
        ";
        $data = array(
            ":id" => $idheal
        );
        return Bdd::prepare($sql,self::$class,$data,true);
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