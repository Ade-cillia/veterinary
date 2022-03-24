<?php
namespace App\Controllers;
class WorkerController {
    public static function index() {
        require_once './public/views/worker/worker.php';
    }
    public static function add() {

        require_once './public/views/worker/worker_add.php';
    }
}