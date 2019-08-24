<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class GamingTest extends \PHPUnit_Framework_TestCase
{
	public function test_Gaming() {
        $gaming = new Gaming\Gaming;
        $cell = new Gaming\Cell();
        $controller = new Gaming\IndexController($gaming, $_POST);


        $gaming->setsize('3x3 Ultra Easy');
        $this->assertEquals('3x3 Ultra Easy', $gaming->getsize());

        $gaming->setname('a');
        $this->assertEquals('a', $gaming->getname());

        $gaming->createarray();
        $size = $gaming->gettablesize();
        $this->assertEquals(3, $size);



	}
}

/// @endcond
