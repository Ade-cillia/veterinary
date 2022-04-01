<?php
require_once __DIR__ . "/App/Autoloader.php";
include_once __DIR__ . '/public/layers/head.php';


use App\Autoloader;
use App\Bdd;
use App\DotEnv;
use App\Controllers\HomeController;
use App\Controllers\WorkerController;
Autoloader::register();
(new DotEnv(__DIR__ . '/.env'))->load();
$pdo = Bdd::connect();

$request = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
switch ($request) {
    case '/' :
    case '' :
        HomeController::index();
        break;
    case '/worker' :
        WorkerController::index();
        break;
    case '/worker/add' :
        WorkerController::add();
        break;
    case '/worker/information':
    case '/worker/information?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /worker');
            exit;
        } else {
            WorkerController::getOne($_GET['id']);
        }
        break;
    case '/worker/delete':
    case '/worker/delete?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /worker');
            exit;
        } else {
            WorkerController::delete($_GET['id']);
        }
        break;
    default:
        http_response_code(404);
        include_once __DIR__ . '/public/views/404_page.php';
        break;
}

include_once __DIR__ . '/public/layers/foot.php';