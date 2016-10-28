<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use Avito;
use Sunra\PhpSimple\HtmlDomParser;
use App\Models\Category;
use App\Models\Region;
use App\Models\City;
use App\Models\Task;
use App\Models\AvitoPageQueue;
use DB;

class ManageController extends Controller
{
    private $avitoConfig = [];

    public function __construct()
    {
        $this->avitoConfig = config('avito', []);

        if(empty($this->avitoConfig)) throw new \Exception('No config defined');
    }

    public function index()
    {
        $tasks = Task::orderBy('ord', 'DESC')->get();

        $queued = AvitoPageQueue::all();

        return view('panel.manage.index', compact(
            'tasks',
            'queued'
        ));
    }

    public function index_()
    {
        $tasks = Task::orderBy('ord', 'DESC')->get();

        return view('panel.manage.index', compact(
            'tasks'
        ));
    }

    public function get($type)
    {
        $jsonData = [];

        try{
            switch($type){
                case 'categories':
                    $i = $this->getAvitoCategories();

                    $jsonData['message'] = $i.' записей получено и сохранено';
                break;
                case 'regions':
                    $i = $this->getAvitoRegions();

                    $jsonData['message'] = $i.' записей получено и сохранено';
                break;
                case 'cities':
                    $i = $this->getAvitoCities();

                    $jsonData['message'] = $i.' записей получено и сохранено';
                break;
            }
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }

        return response()->json($jsonData);
    }

    public function getAvitoCategories()
    {
        $remoteLocation = $this->avitoConfig['url_to_get_categories'];

        // Get remote content to parse
        $content = Avito::getContent($remoteLocation);

        if(empty($content)) throw new \Exception('No content');

        // Load content to the DOM object
        $dom = HtmlDomParser::str_get_html($content);

        if(!is_object($dom)) throw new \Exception('Unable to parse the content (no DOM)');

        $selectA = $dom->find('.header-categories-all__column-wrapper a.header-categories-all__link');

        if(empty($selectA)) throw new \Exception('No categories');

        $data = [];

        DB::statement("SET foreign_key_checks=0");
        DB::table('categories')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $i = 0;
        foreach($selectA as $a)
        {
            $data['url'] = $a->href;
            $data['url'] = str_replace($this->avitoConfig['base_url'].'/moskva', '', $data['url']);
            $data['url'] = trim($data['url']);
            $data['name'] = trim($a->plaintext);

            if(!empty($data['url']) && !empty($data['name'])){
                $category = Category::create($data);

                if(!empty($category->id)) $i++;
            }
        }

        return $i;
    }

    public function getAvitoRegions()
    {
        $remoteLocation = $this->avitoConfig['url_to_get_regions'];

        // Get remote content to parse
        $content = Avito::getContent($remoteLocation);

        if(empty($content)) throw new \Exception('No content');

        // Load content to the DOM object
        $dom = HtmlDomParser::str_get_html($content);

        //$regionsA = $dom->find('.js-index-cities-item[data-iscity!=1]');
        $regionsA = $dom->find('.js-index-cities-item');

        DB::statement("SET foreign_key_checks=0");
        DB::table('regions')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $i = 0;
        foreach($regionsA as $a)
        {
            if(!$a->{'data-iscity'} || $a->{'data-state'} || ($i == 1)) {
                $data['url'] = $a->href;
                $data['url'] = str_replace($this->avitoConfig['base_url'], '', $data['url']);
                $data['url'] = trim($data['url']);
                $data['name'] = trim($a->plaintext);
                $data['remote_id'] = $a->id;
                $data['remote_id'] = str_replace('region_', '', $data['remote_id']);
                $data['remote_id'] = intval($data['remote_id']);

                if (!empty($data['url']) && !empty($data['name'])) {
                    $category = Region::create($data);

                    if (!empty($category->id)) $i++;
                }
            }
        }

        return $i;
    }

    public function getAvitoCities()
    {
        $regions = Region::all();

        if(empty($regions) && !$regions->count()) throw new \Exception('No regions');

        DB::statement("SET foreign_key_checks=0");
        DB::table('cities')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $i = 0;
        foreach($regions as $region) {
            $remoteLocation = $this->avitoConfig['url_to_get_cities'] . $region->remote_id;

            // Get remote content to parse
            $content = Avito::getContent($remoteLocation);

            if (empty($content)) throw new \Exception('No content');

            $json = json_decode($content);


            foreach ($json as $item) {
                $data['name'] = $item->name;
                $data['url'] = '/' . mb_strtolower(Avito::transliterate($item->name));
                $data['name1'] = $item->namePrepositional;
                $data['remote_id'] = $item->id;
                $data['region_remote_id'] = $item->parentId;
                $data['has_metro'] = (!empty($item->metroMap) ? 1 : 0);

                $city = City::create($data);

                if (!empty($city->id)) $i++;
            }
        }

        return $i;
    }
}