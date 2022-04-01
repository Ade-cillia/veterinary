<?php
namespace App\Models;

use App\Bdd;
use App\Tools\VerifData;

class WorkerModel {
    private static $tableName = "worker";
    private static $class = "App\Models\WorkerModel";
    public function __construct() {}

    
    public static function setWorker($data): void {
        $table = self::$tableName;
        
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
        try {
            $response = Bdd::prepare(
                $sql,
                self::$class,
                $insertData,
                false
            );
            header("Location: /worker");
            exit;
        } catch (\Exception $e) {
            echo "une erreur est survenu, veuillez re essayer,Merci";
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
    public static function delete($id) {
        $table = self::$tableName;
        $sql = "DELETE FROM $table WHERE id=:id";
        $data = array(
            ":id" => $id
        );
        return Bdd::prepare($sql,self::$class,$data,false);
    }
}