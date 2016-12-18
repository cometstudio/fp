<?php

namespace App\Models;


class Calendar extends Model
{
    protected $table = 'calendar';

    /**
     * @return $this
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Models\Recipe', 'recipes_calendar', 'calendar_id', 'recipe_id');
    }

    /**
     * @return $this
     */
    public function exercises()
    {
        return $this->belongsToMany('App\Models\Exercise', 'exercises_calendar', 'calendar_id', 'exercise_id')->withPivot('id');
    }
}
