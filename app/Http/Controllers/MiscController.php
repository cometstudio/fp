<?php

namespace App\Http\Controllers;

use App\Models\Misc;
use App\Models\Sitemap;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MiscController extends Controller
{
    public function item($alias, $subalias = '')
    {
        $item = Misc::where('alias', '=', (empty($subalias) ? $alias : $subalias))->first();

        if(empty($item) || (empty($item->parent_id) && empty($item->a))){
            $sitemapModel = new Sitemap();
            $sitemap = $sitemapModel->get();

            return view('errors.e404', [
                'sitemap'=>$sitemap,
                'title'=>404
            ]);
        }else{
            $rootItem = (!empty($item->parent_id)) ? Misc::where('id', '=', $item->parent_id)->firstOrFail() : null;

            $template = !empty($item->template) ? $item->template : 'item';

            $gallery = $item->getGallery();

            return view(
                'misc.'.$template, [
                    'rootItem'=>$rootItem,
                    'item'=>$item,
                    'gallery'=>$gallery,
                    'title'=>(!empty($item->title) ? $item->title : $item->name),
                    //'css'=>$this->css,
                ]
            );
        }
    }
}
