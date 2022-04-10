<?php
namespace App\Classes\TraitClasse;

trait HumanData {
    function getFirstName(){
        return $this->first_name;
    }
    function getLastName(){
        return $this->last_name;
    }
}