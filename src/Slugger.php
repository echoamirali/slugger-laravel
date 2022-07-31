<?php

namespace Echoamirali\Slugger;

use Echoamirali\Slugger\Classes\GoogleTranslate;
use Echoamirali\Slugger\Classes\Symbols;

class Slugger
{
    protected static $config = [];

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

    public static function prepareConfig($config_status, $config_options)
    {
        switch($config_status):
            case 'config_mixed':
                self::$config = array_merge(config('slugger'), $config_options);
                break;
            case 'config_options':
                self::$config = $config_options;
                break;
            case 'config_file':
            default:
                self::$config = config('slugger');
                break;
        endswitch;
    }

    public static function symbolsArray($iteration_symbol = null)
    {
        $iteration_symbol = empty($iteration_symbol) ? config('slugger.iteration_symbol') : $iteration_symbol;
        return ( new Symbols($iteration_symbol) )->get();
    }

    public static function make($string, $config_status = 'config_file' , $config_options = null)
    {
        self::prepareConfig($config_status, $config_options);
        if( isset(self::$config['do_translate'], self::$config['translate_from'], self::$config['translate_to']) && self::$config['do_translate'] )
            $string = self::doTranslate($string, self::$config['translate_from'], self::$config['translate_to']);
        if( isset(self::$config['do_initial']) && self::$config['do_initial'] )
            $string = self::doInitial($string);
        if( isset(self::$config['do_pattern'], self::$config['pattern']) && self::$config['do_pattern'])
            $string = self::doPattern(self::$config['pattern'], $string);
        return $string;
    }
}
