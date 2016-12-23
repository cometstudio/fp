<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Meal;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{
    protected $css = 'calendar';

    public function index()
    {
        $calendar = Calendar::first();

        $exercises = $calendar->exercises()->get();

        $recipes = $calendar->recipes()
            ->join('meals', 'calendar_recipes.meal_id', '=', 'meals.id')
            ->select([
                \DB::raw('meals.id AS meal_id'),
                'recipes.*'
            ])
            ->get();

        $mealIds = $recipes->pluck('meal_id');

        $meals = Meal::whereIn('id', $mealIds)->orderBy('ord', 'DESC')->get();

        return view(
            'calendar.index', [
                'css'=>$this->css,
                'calendar'=>$calendar,
                'exercises'=>$exercises,
                'meals'=>$meals,
                'recipes'=>$recipes,
            ]
        );
    }
    public function item()
    {
        $this->css = 'calendar';

        return view(
            'calendar.item', [
                'css'=>$this->css,
            ]
        );
    }
}
