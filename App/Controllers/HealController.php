<?php
namespace App\Controllers;

use App\Bdd;
use App\Models\AnimalModel;
use App\Models\CabinetModel;
use App\Models\HealModel;
use App\Models\WorkerModel;

class HealController extends Controller{
    public static function index() {
        $allHeal =  HealModel::getAll();
        include_once './public/views/heal/heal.php';
    }
    public static function add() {
        $allWorker =  WorkerModel::getAll();
        $allRoom =  CabinetModel::getAllRoom();
        $allAnimal = AnimalModel::getAll();
        if (isset($_POST['submit'])) {
            HealModel::setHealTreatment($_POST);
        }
        include_once './public/views/heal/heal_add.php';
        
    }
    public static function getOne($id) {
        $heal = HealModel::getOne($id);
        var_dump($heal);
        include_once './public/views/heal/heal_info.php';
    }

    public static function delete($id) {
        HealModel::delete($id);
        header("Location: /heal");
        exit;
    }
}