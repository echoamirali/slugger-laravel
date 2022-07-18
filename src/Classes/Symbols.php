<?php

namespace Echoamirali\Slugger\Classes;

use NumberFormatter;

class Symbols {

    protected $range;

    public function __construct($symbol)
    {
        switch($symbol):
            case 'decimal':
                $this->range = range(1,99);
                break;
            case 'decimal_leading_zero':
                $this->range = array_map([get_called_class(), 'toLeadingZero'], range(1,99));
                break;
            case 'roman':
                $this->range = array_map([get_called_class(), 'toRoman'], range(1,99));
                break;
            case 'ordinal_numbers':
                $this->range = array_map([get_called_class(), 'toOrdinal'], range(1,99));
                break;
            default:
                if( in_array($symbol, array_keys(config('slugger.custom_iteration_symbols'))) )
                    $this->range = config('slugger.custom_iteration_symbols.'.$symbol);
                else
                    $this->range = range(1,99);
                break;
        endswitch;
    }

    public function toOrdinal($number)
    {
        $locale = 'en_US';
        $nf = new NumberFormatter($locale, NumberFormatter::ORDINAL);
        return $nf->format($number);
    }

    public function toRoman($number) {
        $map = ['XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return strtolower($returnValue);
    }

    public function toLeadingZero($number)
    {
        return sprintf('%03d', $number);
    }

    public function get()
    {
        array_unshift($this->range, "");
        unset($this->range[0]);
        return $this->range;
    }
}