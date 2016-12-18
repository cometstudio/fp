<?php

namespace App\Models;

use Illuminate\Http\Request;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'name',
        'email',
        'main_page_title',
        'title',
        'name',
        'counter',
    ];
}
