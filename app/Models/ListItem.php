<?php

namespace App\Models;

class ListItem extends Model
{
    protected $dateFormat = 'U';

    protected $fillable = [
            'name',
            'url',
            'origin_id',
            'price',
            'descriprion',
        ];
}
