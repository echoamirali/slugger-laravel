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
                $this->config = array_merge(config('slugger'), $config_options);
                break;
            case 'config_options':
                $this->config = $config_options;
                break;
            case 'config_file':
            default:
                $this->config = config('slugger');
                break;
        endswitch;
    }

    // config status options = config_file, config_options, config_mixed
    public static function make($string, $config_status = 'config_file' , $config_options = null)
    {
        self::prepareConfig($config_status, $config_options);
        if( isset($this->config['do_translate'], $this->config['translate_from'], $this->config['translate_to']) && $this->config['do_translate'] )
            $string = self::doTranslate($string, $this->config['translate_from'], $this->config['translate_to']);
        if( isset($this->config['do_initial']) && $this->config['do_initial'] )
            $string = self::doInitial($string);
        if( isset($this->config['do_pattern'], $this->config['pattern']) && $this->config['do_pattern'])
            $string = self::doPattern($this->config['pattern'], $string);
        return $string;
    }
}
