<?php

namespace App\Models;

use Illuminate\Http\Request;

class AvitoPageQueue extends Model
{
    protected $table = 'avito_page_queue';

    protected $fillable = [
        'url',
        'avito_page_id',
        'type',
        'l_status',
        'i_status',
    ];

    public function avitoPage()
    {
        return $this->hasOne('\App\Models\AvitoPage', 'id', 'avito_page_id');
    }

    public function modifyQueryBuilder(Request $request, &$builder, array $selectColumns = ['*'])
    {
        $builder->where(function ($q) use ($request){
            if($query = $request->get('query')){
                $q->where('url', 'LIKE', \DB::raw("'%{$query}%'"));
            }
        });

        $builder->select($selectColumns);
    }
}
