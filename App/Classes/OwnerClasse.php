<?php

namespace App\Classes;

use App\Classes\TraitClasse\HumanData;

class OwnerClasse extends Classe{
    protected $first_name;
    protected $last_name;
    use HumanData;
    public function calculateTurnover($allAnimalForOneOwner){
        $this->turnover=0;
        foreach ($allAnimalForOneOwner as $key => $animal) {
            $this->turnover += ($animal->calculateTurnover()->getTurnover());
        }
        return $this;
    }
}
