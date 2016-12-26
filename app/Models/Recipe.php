<?php

namespace App\Models;

class Recipe extends Model
{
    protected $resizerConfigSet = 'dirs.recipe';

    protected $fillable = [
        'name',
        'notice',
        'text',
        'protein',
        'fat',
        'carbohydrates',
        'calories',
        'gallery',
        'gallery_titles',
    ];

    public function meal()
    {
        return $this->hasOne('Models/Meal', 'id', 'meal_id');
    }
}
