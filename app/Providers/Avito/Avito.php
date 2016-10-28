<?php

namespace App\Providers\Avito;

use Curl;

class Avito
{
    public $config;

    public function __construct()
    {
        $this->config = config('avito');
    }

    public function getBaseURL()
    {
        return $this->config['protocol'].':'.$this->config['base_url'];
    }

    /**
     * @param $remoteLocation
     * @param null $localCopyLocation
     * @param string $baseURL
     * @return mixed|null
     */
    public function getContent($remoteLocation, $localCopyLocation = null, $baseURL = ''){
        try{
            $avitoConfig = config('avito');

            if(empty($remoteLocation)) throw new \Exception;

            if(empty($baseURL)) $remoteLocation = $this->getBaseURL().$remoteLocation;

            $content = Curl::to($remoteLocation)
                ->withOption('PROXY', "89.250.162.235:3128")
//                ->withOption('PROXYUSERPWD', "username:password")
                ->withOption('FOLLOWLOCATION', TRUE)
                ->withOption('RETURNTRANSFER', TRUE)
                ->withOption('HEADER', TRUE)
                ->get();

//            $remoteLocation = 'https://www.avito.ru';
//            $proxy = '89.250.162.235:3128';
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $remoteLocation);
//            curl_setopt($ch, CURLOPT_PROXY, $proxy);
//            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//            curl_setopt($ch, CURLOPT_HEADER, TRUE);
//            $content = curl_exec($ch);
//            curl_close($ch);

            if(empty($content)) throw new \Exception;

            if(!empty($localCopyLocation)){
                $storeResult = file_put_contents($localCopyLocation, $content);
                if(empty($storeResult)) throw new \Exception;
            }

            return !empty($localCopyLocation) ? $localCopyLocation : $content;
        }catch (\Exception $e){
            return null;
        }
    }

    public function transliterate($string = '')
    {
        $inputArr = [
            ' ', 'a','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ь','ы','ъ','э','ю','я'
        ];
        $replaceArr = [
            '_', 'a','b','v','g','d','e','yo','zh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','ts','ch','sh','sh','','y','','e','yu','ya'
        ];

        $string = str_replace($inputArr, $replaceArr, $string);

        $inputArr = [
            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ь','Ы','Ъ','Э','Ю','Я'
        ];
        $replaceArr = [
            'A','B','V','G','D','E','YO','ZH','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F','H','TS','CH','SH','SH','','Y','','E','YU','YA'
        ];

        $string = str_replace($inputArr, $replaceArr, $string);

        return $string;
    }
}
