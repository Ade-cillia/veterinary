<?php
namespace App;
use PDO,PDOException;

abstract class Bdd {
    public function __construct() {

    }
    public static function connect(){
        $dsn= getenv("DB_TYPE").":dbname=".getenv("DB_NAME").";host=".getenv("DB_HOST").":".getenv("DB_PORT");
        try {
            $pdo = new PDO($dsn, getenv("DB_USER"), getenv("DB_PASSWORD"));
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }
}
?>
