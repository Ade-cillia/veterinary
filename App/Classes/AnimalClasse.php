<?php

namespace App\Classes;

use App\Models\HealModel;

class AnimalClasse extends Classe{
    public function calculateTurnover(): self{  
        $allPrice = HealModel::getPriceForOneAnimal($this->id);
        $this->turnover=0;
        foreach ($allPrice as $key => $value) {
            $this->turnover += $value->price;
        }
        return $this;
    }
}
