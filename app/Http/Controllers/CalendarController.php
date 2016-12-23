<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Meal;
use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{
    protected $css = 'calendar';

    public function index(Request $request)
    {
        $startAt = $request->has('date') ? \Date::getTimeFromDate($request->get('date')) : time();

        $seasonStartedAt = !empty(view()->shared('settings')->start_at) ? view()->shared('settings')->start_at : time();

        $seasonDaysLeft = intval(($startAt - $seasonStartedAt) / 86400) + 1;

        $calendar = Calendar::where('start_at', '>=', mktime(0,0,0, date('m', $startAt), date('j', $startAt), date('Y', $startAt)))
            ->where('start_at', '<=', mktime(23,59,59, date('m', $startAt), date('j', $startAt), date('Y', $startAt)))
            ->firstOrFail();

        $exercises = $calendar->exercises()->get();

        $recipes = $calendar->recipes()->get();

        $mealIds = $recipes->pluck('meal_id');

        $meals = Meal::whereIn('id', $mealIds)->orderBy('ord', 'DESC')->get();

        return view(
            'calendar.index', [
                'css'=>$this->css,
                'startAt'=>$startAt,
                'seasonDaysLeft'=>$seasonDaysLeft,
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
