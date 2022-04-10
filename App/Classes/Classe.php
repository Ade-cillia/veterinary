<?php

namespace App\Classes;

abstract class Classe {
    protected  $id;
    protected $turnover;
    public function __construct(){
        $this->turnover = 0;
    }
    public function __call($methode, $arg){
        echo "<p class='red'>La méthode '$methode' est inaccessible</p>";
    }
    public function __get($property){
        echo "<p class='red'>L'information '$property' est inaccessible</p>";
    }

    public function calculateTurnover($allInfo){
        $this->turnover=0;
        foreach ($allInfo as $key => $value) {
            $this->turnover += $value->price;
        }
        return $this;
    }

    final public function getId(){
        return $this->id;
    }
    public function getTurnover(){
        return $this->turnover;
    }
}
