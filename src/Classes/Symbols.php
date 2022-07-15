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
                $this->range = $this->fillDecimalLeadingZero();
                break;
        endswitch;

    }

    protected function fillDecimalLeadingZero()
    {
        foreach(range(1, 99) as $number):
            $this->range[] = sprintf('%03d', $number);
        endforeach;
    }
}