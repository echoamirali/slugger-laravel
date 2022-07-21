<?php

namespace Echoamirali\Slugger;

use Echoamirali\Slugger\Classes\GoogleTranslate;

class Slugger
{
    public static function doInitial($string)
    {
        $string = trim($string);
        $string = self::do_translate($string);
        $string = preg_replace('/\s+/u', '-', $string);
        $string = mb_strtolower($string);
        return $string;
    }

    public static function doTranslate($string, $from, $to)
    {
        $translator = new GoogleTranslate();
            
        $string = $translator->translate($from, $to, $string);

        return $string;
    }

    
    public static function doPattern($pattern, $string)
    {
        return str_replace('#string#', $string, $pattern);
    }

    
}
