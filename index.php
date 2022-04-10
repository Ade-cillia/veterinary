<?php
require_once __DIR__ . "/App/Autoloader.php";
include_once __DIR__ . '/public/layout/head.php';

date_default_timezone_set('Europe/Paris');

//use App\Autoloader;
use App\Bdd;
use App\DotEnv;
use App\Controllers\HomeController;
use App\Controllers\WorkerController;
use App\Controllers\AnimalController;
use App\Controllers\OwnerController;
use App\Controllers\HealController;
//Autoloader::register();
require_once "vendor/autoload.php";
(new DotEnv(__DIR__ . '/.env'))->load();
$pdo = Bdd::connect();

$request = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
switch ($request) {
    case '/' :
    case '' :
        HomeController::index();
        break;
    
    //WORKER
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

    //ANIMAL
    case '/animal' :
        AnimalController::index();
        break;
    case '/animal/add' :
        AnimalController::add();
        break;
    case '/animal/information':
    case '/animal/information?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /animal');
            exit;
        } else {
            AnimalController::getOne($_GET['id']);
        }
        break;
    case '/animal/delete':
    case '/animal/delete?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /animal');
            exit;
        } else {
            AnimalController::delete($_GET['id']);
        }
        break;

    //OWNER
    case '/owner' :
        OwnerController::index();
        break;
    case '/owner/add' :
        OwnerController::add();
        break;
    case '/owner/information':
    case '/owner/information?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /owner');
            exit;
        } else {
            OwnerController::getOne($_GET['id']);
        }
        break;
    case '/owner/delete':
    case '/owner/delete?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /owner');
            exit;
        } else {
            OwnerController::delete($_GET['id']);
        }
        break;

    //HEAL
    case '/heal' :
        HealController::index();
        break;
    case '/heal/add' :
        HealController::add();
        break;
    case '/heal/information':
    case '/heal/information?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /heal');
            exit;
        } else {
            HealController::getOne($_GET['id']);
        }
        break;
    case '/heal/delete':
    case '/heal/delete?'.$query :
        if (!isset($_GET['id'])) {
            header('Location: /heal');
            exit;
        } else {
            HealController::delete($_GET['id']);
        }
        break;
    default:
        http_response_code(404);
        include_once __DIR__ . '/public/views/404_page.php';
        break;
}

include_once __DIR__ . '/public/layout/foot.php';