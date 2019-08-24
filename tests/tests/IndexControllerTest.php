<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    public function test_Constructor(){
        $gaming = new Gaming\Gaming;
        $controller = new Gaming\GamingController($gaming, $_POST);

        $this->assertFalse($controller->isReset());
        $this->assertEquals('game.php', $controller->getRedirect());

    }
}

/// @endcond
