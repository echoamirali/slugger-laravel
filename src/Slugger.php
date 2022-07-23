<?php

namespace Echoamirali\Slugger;

use Echoamirali\Slugger\Classes\GoogleTranslate;

class Slugger
{
    public static function doInitial($string)
    {
        $string = trim($string);
        $string = preg_replace('/\s+/u', '-', $string);
        $string = mb_strtolower($string);
        return $string;
    }

    public static function doTranslate($string, $from, $to)
    {
        $translator = new GoogleTranslate();
        $from = empty($from) ? 'en' : $from;
        $to = empty($to) ? 'en' : $to;
        $string = $translator->translate($from, $to, $string);

        return $string;
    }

    
    public static function doPattern($pattern, $string)
    {
        return str_replace('#string#', $string, $pattern);
    }

    public static function make($string, $from_config = true, $config_options = null)
    {
        $config = $from_config ? config('slugger') : $config_options;
        if( isset($config['do_translate'], $config['translate_from'], $config['translate_to']) && $config['do_translate'] )
            $string = self::doTranslate($string, $config['translate_from'], $config['translate_to']);
        if( isset($config['do_initial']) && $config['do_initial'] )
            $string = self::doInitial($string);
        if( isset($config['do_pattern'], $config['pattern']) && $config['do_pattern'])
            $string = self::doPattern($config['pattern'], $string);
        return $string;
    }
}
