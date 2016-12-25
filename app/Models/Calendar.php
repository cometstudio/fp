<?php

namespace App\Models;

use Illuminate\Http\Request;

class Calendar extends Model
{
    protected $table = 'calendar';
    protected $resizerConfigSet = 'dirs.calendar';

    protected $fillable = [
        'text',
        'gallery',
        'gallery_titles',
        'collect_gallery',
        'video',
        'collect_video',
    ];

    /**
     * @return $this
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Models\Recipe', 'calendar_recipes', 'calendar_id', 'recipe_id')
            ->join('meals', 'meals.id', '=', 'calendar_recipes.meal_id')
            ->select([
                'recipes.*',
                \DB::raw('meals.name AS meal_name'),
                \DB::raw('meals.id AS meal_id'),
            ])
            ->orderBy('meals.ord', 'DESC')
            ->orderBy('recipes.ord', 'DESC')
            ->withPivot('id');
    }

    /**
     * @return $this
     */
    public function exercises()
    {
        return $this->belongsToMany('App\Models\Exercise', 'calendar_exercises', 'calendar_id', 'exercise_id')
            ->orderBy('calendar_exercises.id', 'ASC')
            ->withPivot('id');
    }

    public function getOptions()
    {
        $exercises = Exercise::orderBy('name', 'DESC')->get();

        $calendarExercises = $this->exercises()->get();

        $meals = Meal::orderBy('ord', 'DESC')->get();

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

    public function modifyQueryBuilder(Request $request, &$builder, array $selectColumns = ['*'])
    {
        if($query = $request->get('query')) $builder->where('name', 'LIKE', \DB::raw("'%{$query}%'"));
        if($date = $request->get('_start_from')) $builder->where('start_at', '>=', \Date::getTimeFromDate($date));
        if($date = $request->get('_start_to')) $builder->where('start_at', '<=', \Date::getTimeFromDate($date));

        $builder->select($selectColumns);
    }

    public function beforeSave($attrubutes = [])
    {
        $this->setStartTime($attrubutes);

        return $this;
    }
}
