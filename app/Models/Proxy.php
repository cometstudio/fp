<?php

namespace App\Models;

class Proxy extends Model
{
    protected $table = 'proxy';

    protected $fillable = [
        'host'
    ];

    public function succesfulTriesPercents()
    {
        $successful_tries = ($this->successful_tries > 0) ? intval(($this->successful_tries * 100)/$this->tries) : 0;

        $this->setAttribute('successful_tries_percents', $successful_tries);

        return $successful_tries;
    }
}
