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
                $this->range = array_map([get_called_class(), 'addLeadingZero'], range(1,99));
                break;
            case 'alphabet':
                $this->range = range('a', 'z');
                break;
            case 'roman':
                $this->range = array_map([get_called_class(), 'numberToRoman'], range(1,99));
                break;

        endswitch;
    }

    public function numberToRoman($number) {
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

    public function addLeadingZero($number)
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