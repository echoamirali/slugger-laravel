<?php

namespace Echoamirali\Slugger;

use Echoamirali\Slugger\Classes\GoogleTranslate;

class Slugger
{
    public function do_initial($slug)
    {
        $slug = trim($slug);
        $slug = self::do_translate($slug);
        $slug = preg_replace('/\s+/u', '-', $slug);
        $slug = mb_strtolower($slug);
        return $slug;
    }

    public static function do_translate($slug)
    {
        $translator = new GoogleTranslate();
            
        $slug = $translator->translate(config('slugger.translate_from'), config('slugger.translate_to'), $slug);

        return $slug;
    }


    
}
