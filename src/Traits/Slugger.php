<?php

namespace Echoamirali\Slugger\Traits;
use Echoamirali\Slugger\Slugger as MainSlugger;

trait Slugger {
    
    public function setAttribute($key, $value)
    {
        if( $key == $this->slugger_config['field'] )
            return parent::setAttribute($key, $this->make($value));
        return parent::setAttribute($key, $value);
    }

    public function makeUnique($slug)
    {
        $index = 1;
        $symbols = MainSlugger::symbolsArray();
        $raw_slug = $slug;
        while ( $this->query()->where($this->slugger_config['field'], $slug)->exists() ) {
            $symbol = isset($symbols[$index]) ? $symbols[$index] : $index;
            $slug = $raw_slug."-".$symbol;
            $index++;
        }
        return $slug;
    }

    public function make($string)
    {
        $config = $this->slugger_config;
        $this->slugger_config = array_merge(config('slugger'), $config);
        $slug = MainSlugger::make($string);
        if( $this->slugger_config['is_unique'] )
            return $this->makeUnique($slug);
        return $slug;
    }

}