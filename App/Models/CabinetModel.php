<?php
namespace App\Models;

use App\Bdd;
use App\Tools\VerifData;

class CabinetModel {
    private static $tableName = "cabinet";
    private static $class = "App\Models\CabinetModel";
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
}