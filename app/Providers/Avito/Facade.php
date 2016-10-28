<?php
namespace App\Providers\Avito;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'avito';
    }
}