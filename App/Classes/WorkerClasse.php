<?php

namespace App\Classes;

use App\Classes\TraitClasse\HumanData;

class WorkerClasse extends Classe{
    protected $first_name;
    protected $last_name;
    use HumanData;
    public function __construct() {
    }
}
