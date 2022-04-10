<?php
namespace App\Models;

use App\Bdd;
use App\Tools\VerifData;
use App\Classes\CabinetClasse;

abstract class CabinetModel extends Model{
    protected static $tableName = "cabinet";
    protected static $class = CabinetClasse::class;
    public function __construct() {}

    public static function getAll() {
        $table = self::$tableName;
        $query = "SELECT * FROM $table";
        return Bdd::query($query,self::$class);
    }
    public static function getAllRoom() {
        $table = self::$tableName;
        $query = "SELECT room.* ,$table.name AS cabinet_name,$table.adress AS cabinet_adress,$table.phone AS cabinet_phone
        FROM room
        LEFT JOIN $table ON $table.id=room.cabinet_id
        
        ";
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
    
}