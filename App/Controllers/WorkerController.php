<?php
namespace App\Controllers;

use App\Bdd;
use App\Models\WorkerModel;
use App\Models\CabinetModel;

class WorkerController extends Controller{
    public static function index() {
        $allWorker =  WorkerModel::getAll();
        var_dump($allWorker);
        include_once './public/views/worker/worker.php';
    }
    public static function add() {
        $allCabinet = CabinetModel::getAll();
        $allWorker = WorkerModel::getAll();
        if (isset($_POST['submit'])) {
            WorkerModel::setWorker($_POST);
        }
        include_once './public/views/worker/worker_add.php';
    }
    public static function getOne($id) {
        $worker = WorkerModel::getOne($id);
        
        include_once './public/views/worker/worker_info.php';
    }

    public static function delete($id) {
        WorkerModel::delete($id);
        header("Location: /worker");
        exit;
    }
}