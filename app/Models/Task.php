<?php

namespace App\Models;

use Illuminate\Http\Request;

class Task extends Model
{
    protected $fillable = [
        'name',
        'command',
        'started_at',
        'pid',
        'output_to_a_file',
    ];

    public function getStartDate()
    {
        $time = !empty($this->started_at) ? $this->started_at : time();

        return \Date::getDateFromTime($time, 1);
    }

    public function setStartTime($attrubutes = [])
    {
        $this->started_at = \Date::getTimeFromDate($attrubutes['_start_date'], !empty($attrubutes['_hrs']) ? $attrubutes['_hrs'] : 0, !empty($attrubutes['_hrs']) ? $attrubutes['_mins'] : 0);

        return $this->started_at;
    }

    public function beforeSave($attrubutes = [])
    {
        $this->setStartTime($attrubutes);

        if(empty($attrubutes['pid'])) $this->pid = 0;

        return $this;
    }
}
