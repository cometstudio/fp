<?php

namespace App\Models;

use Illuminate\Http\Request;

class AvitoPage extends Model
{
    protected $fillable = [
        'url',
        'name',
        'started_at',
    ];


    public function queue()
    {
        return $this->hasMany('\App\Models\AvitoPageQueue', 'avito_page_id', 'id');
    }

    public function queueCount()
    {
        $result = $this->queue()->select(\DB::raw('COUNT(*) AS total'))->first();

        return $result->total;
    }

    public function parsedQueueCount()
    {
        $result = $this->queue()->select(\DB::raw('COUNT(*) AS total'))->where(function($q){
            $q->where('l_status', '=', 1);
            $q->orWhere('i_status', '=', 1);
        })->first();

        return $result->total;
    }

    public function queueParsedPercents($totalQueued = 0, $totalParsed = 0)
    {
        $percents = ($totalParsed > 0) ? intval(($totalParsed * 100)/$totalQueued) : 0;

        return $percents;
    }

    public function modifyQueryBuilder(Request $request, &$builder, array $selectColumns = ['*'])
    {
        $builder->where(function ($q) use ($request){
            if($query = $request->get('query')){
                $q->where('url', 'LIKE', \DB::raw("'%{$query}%'"));
                $q->orWhere('name', 'LIKE', \DB::raw("'%{$query}%'"));
            }
        });

        $builder->select($selectColumns);
    }
}
