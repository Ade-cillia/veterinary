<?php
namespace App\Controllers;

use App\Bdd;
use App\Models\AnimalModel;
use App\Models\OwnerModel;
// use App\Models\CabinetModel;

class OwnerController extends Controller{
    public static function index() {
        $allOwner =  OwnerModel::getAll();
        include_once './public/views/owner/owner.php';
    }
    public static function add() {
        if (isset($_POST['submit'])) {
            OwnerModel::setOwner($_POST);
        }
        include_once './public/views/owner/owner_add.php';
    }
    public static function getOne($id) {
        $owner = OwnerModel::getOne($id);
        $allAnimalForOneOwner = AnimalModel::getAllForOneOwner($id);
        include_once './public/views/owner/owner_info.php';
    }

    public static function delete($id) {
        OwnerModel::delete($id);
        header("Location: /owner");
        exit;
    }
}