<?php

namespace Echoamirali\Slugger\Traits;
use Echoamirali\Slugger\Slugger as MainSlugger;

class Slugger {
    
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower($value);
    }

    public function make()
    {
        MainSlugger::make();
    }

}