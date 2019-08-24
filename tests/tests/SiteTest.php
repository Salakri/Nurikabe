<?php
require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
	public function test_getandset() {
        $site = new Gaming\Site();

        $site->setEmail("aaa.com");
        $this->assertContains('aaa.com', $site->getEmail());

        $site->setRoot("123499");
        $this->assertContains('123499', $site->getRoot());

        $site->dbConfigure("host", "user", "abc", "prefix");
        $this->assertEquals($site->getTablePrefix(), "prefix");

	}
    public function test_localize() {
        $site = new Gaming\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize($site);
        }
        $this->assertEquals('testpj_', $site->getTablePrefix());
    }
}

/// @endcond
