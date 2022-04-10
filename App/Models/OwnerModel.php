<?php
namespace App\Models;

use App\Bdd;
use App\Classes\OwnerClasse;
use App\Tools\VerifData;

abstract class OwnerModel extends Model{
    protected static $tableName = "owner";
    protected static $class = OwnerClasse::class;
    public function __construct() {}

    public static function getAll() {
        $table = self::$tableName;
        $query = "SELECT * FROM $table";
        return Bdd::query($query,self::$class);
    }
    public static function getOne($id) {
        $table = self::$tableName;
        $sql = "SELECT * FROM $table WHERE id=:id";
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

    public static function setOwner($data): void {
        $table = self::$tableName;
        $errorExeption = false;
        try {
            $verifData = VerifData::verifOwnerAdd($data);
            $sql= "INSERT INTO $table (last_name,first_name,mail,phone,adress,other) 
                VALUES (:last_name,:first_name,:mail,:phone,:adress,:other)
            ";
            $insertData = (array(
                ':last_name' => $verifData["last_name"],
                ':first_name' => $verifData["first_name"],
                ':mail' => $verifData["mail"],
                ':phone' => $verifData["phone"],
                ':adress' => $verifData["adress"],
                ':other' => $verifData["other"],
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
                header("Location: /owner");
                exit;
            }
        } catch (\Throwable $th) {
            echo '<div class="error"><p>Erreur importante est survenu, Merci de contacter "ElFamosoRéparator-Aurélien"</p></div>';
        }
    }
}