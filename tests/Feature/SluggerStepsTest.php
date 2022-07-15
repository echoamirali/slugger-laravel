<?php 

namespace Echoamirali\Slugger\Tests\Feature;

use Echoamirali\Slugger\Tests\TestCase;
use Echoamirali\Slugger\Slugger;
use Echoamirali\Slugger\Classes\Symbols;

class SluggerStepsTest extends TestCase {

    /** @test */
    function display_types_of_symbols()
    {
        $symbols = new Symbols('decimal');
        var_dump($symbols->get());
    }

}