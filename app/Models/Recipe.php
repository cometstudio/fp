<?php

namespace App\Models;

class Recipe extends Model
{
    public function meal()
    {
        return $this->hasOne('Models/Meal', 'id', 'meal_id');
    }
}
