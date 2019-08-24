<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class IndexViewTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1234; //  the answer is 23

	public function test_indexview() {
        $game = new Gaming\Gaming(self::SEED);
        $view = new Gaming\IndexView($game);


        // Instruction
        $this->assertContains("Name", $view->present());
	}
}

/// @endcond
