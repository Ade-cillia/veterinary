<?php

namespace App\Classes;

abstract class Classe {
    protected  $id;
    public function getId(){
        return $this->id;
    }
}
