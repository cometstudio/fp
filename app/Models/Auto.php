<?php

namespace App\Models;

use Illuminate\Http\Request;

class Auto extends Model
{
    protected $table = 'test_auto';

    public function modifyQueryBuilder(Request $request, &$builder, array $selectColumns = ['*'])
    {
        $builder->where(function ($q) use ($request){
            if($query = $request->get('query')){
                $q->where('marka', 'LIKE', \DB::raw("'%{$query}%'"));
                $q->orWhere('model', 'LIKE', \DB::raw("'%{$query}%'"));
            }
            if($make = $request->get('make')){
                $q->where('marka', '=', $make);
            }
            if($city = $request->get('city')){
                $q->where('sity', '=', $city);
            }
            if($metrostation = $request->get('mstation')){
                $q->where('metro', '=', $metrostation);
            }
        });

        $builder->select($selectColumns);
    }

    public function getOptions()
    {
        $makes = $this
            ->select('marka')
            ->where('marka', '!=', "")
            ->groupBy('marka')
            ->get();

        $metrostations = $this
            ->select('metro')
            ->where('metro', '!=', "")
            ->groupBy('metro')
            ->get();

        $cities = $this
            ->select('sity')
            ->where('sity', '!=', "")
            ->groupBy('sity')
            ->get();

        return compact(
            'makes',
            'metrostations',
            'cities'
        );
    }
}
