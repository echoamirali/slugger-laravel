<?php

namespace Echoamirali\Slugger\Traits;
use Echoamirali\Slugger\Slugger as MainSlugger;

trait Slugger {
    
    public function setAttribute($key, $value)
    {
        if( $key == config('slugger.field') )
            return parent::setAttribute($key, $this->make($value));
        return parent::setAttribute($key, $value);
    }

    public function makeUnique($slug)
    {
        
    }

    public function make($string)
    {
        $slug = MainSlugger::make($string);
    }

}