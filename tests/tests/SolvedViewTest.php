<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class SolvedViewTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1234; //  the answer is 23
    public function test_instructview() {
        $game = new Gaming\Gaming(self::SEED);
        $view = new Gaming\SolvedView($game);


        // Instruction
        $this->assertContains("You're a winner!", $view->presentsolved());
    }
}

/// @endcond
