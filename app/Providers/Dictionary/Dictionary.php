<?php

namespace App\Providers\Dictionary;

class Dictionary
{
    protected $dictionary = [];

    public function __construct()
    {
        $this->dictionary = config('dictionary');
    }

    public function get($pointer = '', $value=0)
    {
        try{
            $variants = array_get($this->dictionary, $pointer);

            if(empty($variants)) throw new \Exception;

            $lastDigit = $this->getLastDigit($value);

            // 1
            if($lastDigit == 1){
                if(($value > 10) && ($value < 20)){
                    $index = 2;
                }else{
                    $index = 0;
                }
            // 2-4
            }elseif(($lastDigit >= 2) && ($lastDigit <= 4)){
                if(($value > 10) && ($value < 20)){
                    $index = 2;
                }else{
                    $index = 1;
                }
            }
            // 0, 5-9
            elseif(empty($lastDigit) || (($lastDigit >= 5) && ($lastDigit <= 9))) {
                $index = 2;
            }else throw new \Exception;

            if(empty($variants[$index])) throw new \Exception;

            return $variants[$index];
        }catch (\Exception $e){
            return null;
        }
    }

    protected function getLastDigit($value = 0)
    {
        $lastDigit = $value%10;

        return $lastDigit;
    }
}
