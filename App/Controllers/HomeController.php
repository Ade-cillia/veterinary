<?php
namespace App\Controllers;
class HomeController extends Controller{
    public static function index() {
        include_once './public/views/home.php';
    }
}