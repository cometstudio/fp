<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Resizer;
use Date;
use Illuminate\Http\Request;

class Model extends BaseModel
{
    protected $dateFormat = 'U';
    protected $resizerConfigSet = 'dirs.default';

    public function getResizerConfigSet()
    {
        return $this->resizerConfigSet;
    }

    public function getValidationRules()
    {
        return [];
    }

    public function getValidationMessages()
    {
        return [];
    }

    public function getGallery($useEmptyImage = false, $skipFirst = false)
    {
        try{
            $gallery = \Resizer::gallery($this->gallery, $useEmptyImage, $skipFirst);

            if(empty($gallery)) throw  new \Exception;
            
            return $gallery;
        }catch (\Exception $e){
            return [];
        }
    }

    public function setGallery(array $gallery = [])
    {
        $this->gallery = Resizer::galleryString($gallery);

        return $this->gallery;
    }

    public function getGalleryTitles()
    {
        return \Resizer::galleryTitles($this->gallery_titles);
    }
    
    public function getThumbnail()
    {
        $gallery = $this->getGallery(true, false);
    
        return reset($gallery);
    }

    public function bodyP($query)
    {
        $l = $r = 150;

        $string = strip_tags($this->body);

        $pos = stripos($string, $query);

        $l = $pos > $l ? $pos - $l : 0;

        $r = (strlen($string) > $r * 2) ? $r * 2 : strlen($string);

        $snippet = substr($string, $l, $r);

        $snippetExploded = explode(' ', $snippet);

        if($l){
            array_shift($snippetExploded);
            array_unshift($snippetExploded, '...');
        }

        if(($l + $r) < strlen($string)){
            array_pop($snippetExploded);
            array_push($snippetExploded, '...');
        }

        $snippet = implode(' ', $snippetExploded);

        $snippet = str_replace($query, "<span>{$query}</span>", $snippet);

        return $snippet;
    }

    public function bodyP_($query){
        $p = strip_tags($this->body);
        $p = explode("\n", $p);
        $p = array_filter($p);

        return reset($p);
    }

    public function setStartTime($attrubutes = [])
    {
        $this->start_time = Date::getTimeFromDate($attrubutes['_start_date'], !empty($attrubutes['_hrs']) ? $attrubutes['_hrs'] : 0, !empty($attrubutes['_hrs']) ? $attrubutes['_mins'] : 0);

        return $this->start_time ;
    }

    public function getStartDate()
    {
        $time = !empty($this->start_time) ? $this->start_time : time();

        return Date::getDateFromTime($time, 1);
    }

    /**
     * Factory a model object by its public name (URL alias)
     * @param string $modelName
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    protected function factory($modelName = '')
    {
        $modelClassName = studly_case($modelName);

        $modelClassPath = '\App\Models\\'.$modelClassName;

        if(!class_exists($modelClassPath)) throw new \Exception('Model '.$modelClassName.' does not exist');

        $model = App::make($modelClassPath);

        return $model;
    }

    public function getOptions()
    {
        return [];
    }

    public function modifyQueryBuilder(Request $request, &$builder, array $selectColumns = ['*'])
    {
        if($query = $request->get('query')) $builder->where('name', 'LIKE', \DB::raw("'%{$query}%'"));

        $builder->select($selectColumns);
    }

    public function beforeSave($attrubutes = [])
    {
        return $this;
    }

    public function beforeUpdate($attrubutes = [])
    {
        return $this;
    }
}
