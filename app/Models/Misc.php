<?php

namespace App\Models;

use App\Providers\Dictionary\Dictionary;
use Illuminate\Http\Request;

class Misc extends Model
{
    protected $table = 'misc';

    protected $fillable = [
        'parent_id',
        'a',
        'inmenu',
        'name',
        'short_name',
        'body',
        'raw_body',
        'gallery',
        'template',
    ];

    public function modifyQueryBuilder(Request $request, &$builder, array $selectColumns = ['*'])
    {
        if($query = $request->get('query')) $builder->where('name', 'LIKE', \DB::raw("'%{$query}%'"));
        if($pid = $request->get('pid')) $builder->where('parent_id', '=', $pid);

        $builder->select($selectColumns);
    }

    public function beforeSave($attrubutes = [])
    {
        $this->setAlias($attrubutes);

        return $this;
    }

    public function beforeUpdate($attrubutes = [])
    {
        $this->setAlias($attrubutes);

        return $this;
    }

    protected function setAlias($attrubutes)
    {
        $this->setAttribute('alias', (empty($attrubutes['alias']) ? strtolower(Dictionary::transliterate((!empty($attrubutes['short_name']) ? $attrubutes['short_name'] : $attrubutes['name']))) : $attrubutes['alias']));
    }

    public function parent()
    {
        return $this->hasOne('App\Models\Misc', 'id', 'parent_id');
    }

    public function getOptions()
    {
        $misc = $this->where('id', '!=', $this->id)->where('parent_id', '=', 0)->get();

        return [
            'misc'=>$misc
        ];
    }
}
