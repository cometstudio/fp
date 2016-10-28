<?php
namespace App\Providers\Pmanager;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pmanager';
    }
}