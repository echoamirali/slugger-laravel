<?php 

namespace Echoamirali\Slugger\Tests\Feature;

use Echoamirali\Slugger\Tests\TestCase;
use Echoamirali\Slugger\Slugger;
use Echoamirali\Slugger\Classes\Symbols;

class SluggerStepsTest extends TestCase {

    /** @test */
    function display_types_of_symbols()
    {
        $symbols = new Symbols('numbers_in_word');
        var_dump($symbols->get());
    }

}