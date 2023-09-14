<?php
namespace App\Misaeto;

use Illuminate\Support\Facades\Facade;

class MisaetoFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return "Misaeto";
    }
}
