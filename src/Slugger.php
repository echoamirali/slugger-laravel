<?php

namespace Echoamirali\Slugger;

use Echoamirali\Slugger\Classes\GoogleTranslate;

class Slugger
{
    public function do_initial($slug)
    {
        $slug = self::do_translate($slug);
        $slug = trim($slug);
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = strtolower($slug);
        return $slug;
    }

    public static function do_translate($slug)
    {
        $translator = new GoogleTranslate();
            
        $slug = $translator->translate('en', 'fa', $slug);

        return $slug;
    }
    
}
