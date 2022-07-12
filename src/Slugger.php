<?php

namespace Echoamirali\Slugger;

class Slugger
{
    public function do_initial($slug)
    {
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = strtolower($slug);
    }

    
}
