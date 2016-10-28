<?php

namespace App\Models;

class City extends Model
{
    protected $fillable = [
        'name',
        'name1',
        'url',
        'remote_id',
        'region_remote_id',
        'has_metro',
    ];

    public function getOptions()
    {
        $regions = Region::orderBy('name', 'ASC')->get();

        return compact(
            'regions'
        );
    }
}
