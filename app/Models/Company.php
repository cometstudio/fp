<?php

namespace App\Models;

use Illuminate\Http\Request;

class Company extends Model
{
    protected $fillable = [
        'name',
        'url',
        'email',
        'www',
        'phones',
        'address',
        'comments',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'company_categories', 'company_id', 'category_id')->withPivot('id');
    }

        public function getOptions()
    {
        //$categories = Category::orderBy('name', 'ASC')->get();

        $categories = Category::select(['id', 'name'])
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return compact(
            'categories'
        );
    }
}
