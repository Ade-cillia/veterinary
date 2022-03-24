<?php
require_once __DIR__ . "/App/Autoloader.php";



use App\Autoloader;
use App\Bdd;
use App\DotEnv;
use App\Controllers\HomeController;
use App\Controllers\WorkerController;
Autoloader::register();
(new DotEnv(__DIR__ . '/.env'))->load();
Bdd::connect();


function newEcho($txt){
    echo $txt ."</br>";
}

$request = $_SERVER['REQUEST_URI'];
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
    default:
        http_response_code(404);
        require_once __DIR__ . '/public/views/404_page.php';
        break;
}