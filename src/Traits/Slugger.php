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
        $index = 1;
        $symbols = MainSlugger::symbolsArray();
        $raw_slug = $slug;
        while ( $this->query()->where(config('slugger.field'), $slug)->exists() ) {
            $slug = $raw_slug."-".$symbols[$index];
            $index++;
        }
        die($slug);
        return $slug;
    }

    public function make($string)
    {
        $slug = MainSlugger::make($string);
        return $this->makeUnique($slug);
    }

}