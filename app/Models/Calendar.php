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
        return $this->belongsToMany('App\Models\Recipe', 'calendar_recipes', 'calendar_id', 'recipe_id')->withPivot('id');
    }

    /**
     * @return $this
     */
    public function exercises()
    {
        return $this->belongsToMany('App\Models\Exercise', 'calendar_exercises', 'calendar_id', 'exercise_id')->withPivot('id');
    }

    public function getOptions()
    {
        $exercises = Exercise::orderBy('name', 'DESC')->get();

        $calendarExercises = $this->exercises()->get();

        $meals = Meal::orderBy('name', 'DESC')->get();

        $recipes = Recipe::orderBy('name', 'DESC')->get();

        $calendarRecipes = $this->recipes()->get();

        return compact(
            'exercises',
            'meals',
            'recipes',
            'calendarExercises',
            'calendarRecipes',
            'calendarRecipes'
        );
    }
}
