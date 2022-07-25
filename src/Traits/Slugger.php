<?php

namespace Echoamirali\Slugger\Traits;
use Echoamirali\Slugger\Slugger as MainSlugger;

trait Slugger {
    
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $this->make($value);
    }

    public function make($string)
    {
        return MainSlugger::make($string);
    }

}