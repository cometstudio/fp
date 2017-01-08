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

    public function totalMacros(&$recipes = null)
    {
        $totalMacros = [
            'protein'=>0,
            'fat'=>0,
            'carbohydrates'=>0,
            'energy'=>0,
            'protein_f'=>0,
            'fat_f'=>0,
            'carbohydrates_f'=>0,
            'energy_f'=>0,
        ];

        if(empty($recipes)) $recipes = $this->recipes();

        if(!empty($recipes) && $recipes->count()){
            foreach($recipes as $recipe){
                if($macros = $recipe->macros()){
                    $recipe->macros = $macros;
                    foreach($macros as $key=>$value){
                        $totalMacros[$key] += $value;
                    }
                }
            }
        }

        $dailyValues = [
            'protein'=>250,
            'fat'=>100,
            'carbohydrates'=>300,
            'energy'=>2500,
        ];

        foreach($dailyValues as $ingridient=>$value){
            $totalMacros[$ingridient.'_daily']['value'] = intval($totalMacros[$ingridient] * 100 / $value);
            $totalMacros[$ingridient.'_daily']['active'] = ($totalMacros[$ingridient.'_daily']['value'] < 90) || ($totalMacros[$ingridient.'_daily']['value'] > 110) ? true : false;
        }

        return $totalMacros;
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

    public function getByTime($startAt = 0)
    {
        try{
            $builder = $this;

            if(!empty($startAt)){
                $builder
                    ->where('start_at', '>=', mktime(0,0,0, date('m', $startAt), date('j', $startAt), date('Y', $startAt)))
                    ->where('start_at', '<=', mktime(23,59,59, date('m', $startAt), date('j', $startAt), date('Y', $startAt)));
            }

            return $builder->first();
        }catch (\Exception $e){
            return null;
        }
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
