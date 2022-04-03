<?php
namespace App\Controllers;

use App\Bdd;
use App\Models\HealModel;

class HealController {
    public static function index() {
        $allAnimals =  HealModel::getAll();
        include_once './public/views/heal/heal.php';
    }
    public static function add() {
        if (isset($_POST['submit'])) {
            HealModel::setAnimal($_POST);
        }
        include_once './public/views/heal/heal_add.php';
        
    }
    public static function getOne($id) {
        $animal = HealModel::getOne($id);
        include_once './public/views/heal/heal_info.php';
    }

    public static function delete($id) {
        HealModel::delete($id);
        header("Location: /heal");
        exit;
    }
}