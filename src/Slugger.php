<?php

namespace Echoamirali\Slugger;

use Echoamirali\Slugger\Classes\GoogleTranslate;

class Slugger
{
    protected $config = [];

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

    public function prepareConfig($config_status, $config_options)
    {
        switch($config_status):
            case 'config_mixed':
                $config = array_merge(config('slugger'), $config_options);
                break;
            case 'config_options':
                $config = $config_options;
                break;
            case 'config_file':
            default:
                $config = config('slugger');
                break;
        endswitch;
        return $config;
    }

    // config status options = config_file, config_options, config_mixed
    public static function make($string, $config_status = 'config_file' , $config_options = null)
    {
        $config = $this->prepareConfig($config_status, $config_options);
        if( isset($config['do_translate'], $config['translate_from'], $config['translate_to']) && $config['do_translate'] )
            $string = self::doTranslate($string, $config['translate_from'], $config['translate_to']);
        if( isset($config['do_initial']) && $config['do_initial'] )
            $string = self::doInitial($string);
        if( isset($config['do_pattern'], $config['pattern']) && $config['do_pattern'])
            $string = self::doPattern($config['pattern'], $string);
        return $string;
    }
}
