<?php

namespace App\Models;

use Illuminate\Http\Request;

class Test extends Model
{
    protected $table = 'test1';


    public function modifyQueryBuilder(Request $request, &$builder, array $selectColumns = ['*'])
    {
        $builder->where(function ($q) use ($request){
            if($query = $request->get('query')){
                $q->where('title', 'LIKE', \DB::raw("'%{$query}%'"));
            }
            if($categoryId = $request->get('cid')){
                $q->where('cat', '=', $categoryId);
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
        //$categories = Category::orderBy('name', 'ASC')->get();

        $categories = $this
            ->select('cat')
            ->where('cat', '!=', "")
            ->groupBy('cat')
            ->get();

        $cities = $this
            ->select('sity')
            ->where('sity', '!=', "")
            ->groupBy('sity')
            ->get();

        $metrostationsBuilder = $this
            ->select('metro')
            ->where('metro', '!=', "")
            ->groupBy('metro');

        $city = request('city', null);
        if(!empty($city)) $metrostationsBuilder->where('sity', '=', $city);

        $metrostations = $metrostationsBuilder
            ->get();

        return compact(
            'categories',
            'metrostations',
            'cities'
        );
    }
}
