<?php 

namespace Echoamirali\Slugger\Tests\Feature;

use Echoamirali\Slugger\Tests\TestCase;
use Echoamirali\Slugger\Slugger;
use Echoamirali\Slugger\Classes\Symbols;

class SluggerStepsTest extends TestCase {

    /** @test */
    function display_types_of_symbols()
    {
        $symbols = new Symbols('ordinal_numbers');
        var_dump($symbols->get());
    }

    /** @test */
    function display_slugger_main_method()
    {
        die(Slugger::make('سلام چطوری خوبی'));
    }

}