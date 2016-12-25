<?php

namespace App\Models;


class Exercise extends Model
{
    protected $fillable = [
        'name',
        'text',
        'notice',
        'gallery',
        'gallery_titles',
    ];
}
