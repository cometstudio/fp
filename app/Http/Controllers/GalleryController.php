<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Date;
use App\Models\Comment;

class GalleryController extends Controller
{
    protected $css = 'gallery';

    public function index(Request $request)
    {
        $gallery = Calendar::where('collect_gallery', '=', 1)
            ->join('comments', 'comments.hash', '=', \DB::raw('MD5(CONCAT("'.$request->segments()[0].'_", calendar.id))'), 'LEFT')
            ->select([
                'calendar.*',
                \DB::raw('COUNT(comments.id) AS comments_total'),
            ])
            ->groupBy([
                'calendar.id'
            ])
            ->orderBy('calendar.start_at', 'DESC')
            ->get();

        $title = 'Фотоотчёты';

        return view(
            'gallery.index', [
                'css'=>$this->css,
                'title'=>$title,
                'gallery'=>$gallery,
            ]
        );
    }
    public function item(Request $request, $id = 0)
    {
        $this->css = 'gallery';

        $item = Calendar::where('calendar.id', '=', $id)
            ->join('comments', 'comments.hash', '=', \DB::raw('MD5(CONCAT("'.$request->segments()[0].'_", calendar.id))'), 'LEFT')
            ->select([
                'calendar.*',
                \DB::raw('COUNT(comments.id) AS comments_total'),
            ])
            ->groupBy([
                'calendar.id'
            ])
            ->firstOrFail();

        $item->setAttribute('gallery_views', $item->gallery_views+1)->update();

        $seasonDaysLeft = Date::seasonDaysLeft($item->start_at);

        $hash = (new Comment)->hash($request->segments()[0].'_'.$item->id);

        $title = 'День '.$seasonDaysLeft.'. Фотоотчёт';

        return view(
            'gallery.item', [
                'css'=>$this->css,
                'title'=>$title,
                'seasonDaysLeft'=>$seasonDaysLeft,
                'item'=>$item,
                'hash'=>$hash,
            ]
        );
    }
}
