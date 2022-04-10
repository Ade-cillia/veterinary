<?php
namespace App\Controllers;

use App\Bdd;
use App\Models\AnimalModel;
use App\Models\HealModel;
use App\Models\WorkerModel;
use App\Models\OwnerModel;

class AnimalController extends Controller{
    public static function index() {
        $allAnimals =  AnimalModel::getAll();
        var_dump($allAnimals);
        include_once './public/views/animal/animal.php';
    }
    public static function add() {
        $allOwner = OwnerModel::getAll();
        $allWorker = WorkerModel::getAll();
        if (isset($_POST['submit'])) {
            AnimalModel::setAnimal($_POST);
        }
        include_once './public/views/animal/animal_add.php';
        
    }
    public static function getOne($id) {
        $animal = AnimalModel::getOne($id);
        $allHealForOneAnimal = HealModel::allForOneAnimal($id);
        var_dump($animal);
        include_once './public/views/animal/animal_info.php';
    }

    public static function delete($id) {
        AnimalModel::delete($id);
        header("Location: /animal");
        exit;
    }
}