<?php
namespace App;
use PDO,PDOException;

abstract class Bdd {
    private static $pdo = null;
    public function __construct() {

    }
    public static function connect(): void {
        $dsn= getenv("DB_TYPE").":dbname=".getenv("DB_NAME").";host=".getenv("DB_HOST").":".getenv("DB_PORT");
        try {
            $pdo = new PDO($dsn, getenv("DB_USER"), getenv("DB_PASSWORD"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo = $pdo;
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        return;
    }
    public static function query($statement, $className) {
        $request = self::$pdo->query($statement);
        $response = $request->fetchAll(PDO::FETCH_CLASS,$className); //PDO::FETCH_CLASS = instancie la class
        return $response;
    }
    public static function prepare($statement,$className,$data,$fetchAll) {
        $request = self::$pdo->prepare($statement);
        $request->execute($data);
        $request->setFetchMode(PDO::FETCH_CLASS,$className); //PDO::FETCH_CLASS = instancie la class
        if ($fetchAll) {
            $response = $request->fetchAll();
        }else {
            $response = $request->fetch();
        }
        return $response;
    }
}
?>
