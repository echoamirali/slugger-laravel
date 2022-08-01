<?php

namespace Echoamirali\Slugger\Traits;
use Echoamirali\Slugger\Slugger as MainSlugger;

trait Slugger {
    
    public $slugger_config = [];

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
            $symbol = isset($symbols[$index]) ? $symbols[$index] : $index;
            $slug = $raw_slug."-".$symbol;
            $index++;
        }
        return $slug;
    }

    public function make($string)
    {
        $slug = MainSlugger::make($string);
        if( config('slugger.is_unique') )
            return $this->makeUnique($slug);
        return $slug;
    }

}