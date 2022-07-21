<?php

namespace Echoamirali\Slugger;

use Echoamirali\Slugger\Classes\GoogleTranslate;

class Slugger
{
    public function do_initial($string)
    {
        $string = trim($string);
        $string = self::do_translate($string);
        $string = preg_replace('/\s+/u', '-', $string);
        $string = mb_strtolower($string);
        return $string;
    }

    public static function do_translate($string)
    {
        $translator = new GoogleTranslate();
            
        $string = $translator->translate(config('slugger.translate_from'), config('slugger.translate_to'), $string);

        return $string;
    }


    
}
