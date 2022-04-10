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
        $allHealForOneAnimal = HealModel::getAllForOneAnimal($id);
        include_once './public/views/animal/animal_info.php';
    }
    public static function update($id) {
        $allOwner = OwnerModel::getAll();
        $allWorker = WorkerModel::getAll();
        $animal = AnimalModel::getOne($id);
        if (isset($_POST['submit'])) {
            var_dump($_POST);
            AnimalModel::updateAnimal($_POST);
        }
        include_once './public/views/animal/animal_update.php';
    }

    public static function delete($id) {
        $animal = AnimalModel::getOne($id);
        $picture = "./public/assets/$animal->picture";
        if ($picture != "./public/assets/image/animal/default.png") {
            unlink("./public/assets/$animal->picture");
        }
        AnimalModel::delete($id);
        header("Location: /animal");
        exit;
    }
}