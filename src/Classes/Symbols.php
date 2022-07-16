<?php

namespace Echoamirali\Slugger\Classes;

class Symbols {

    protected $range;

    public function __construct($symbol)
    {
        switch($symbol):
            case 'decimal':
                $this->range = range(1,99);
                break;
            case 'decimal_leading_zero':
                $this->range = array_map(function($val){
                    return sprintf('%03d', $val);
                }, range(1,99));
                break;
            case 'alphabet':
                $this->range = range('a', 'z');
                break;

        endswitch;
    }

    public function get()
    {
        array_unshift($this->range, "");
        unset($this->range[0]);
        return $this->range;
    }
}