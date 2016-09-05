<?php

use analysis\utils\StringUtils;

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/13/2016
 * Time: 9:42 AM
 */
class StringUtilsTest extends PHPUnit_Framework_TestCase
{

    public function testGetValueOrDefault_Value() {
        $this->assertEquals("test", StringUtils::getValueOrDefault("test"));
    }

    public function testGetValueOrDefault_Null() {
        $this->assertNull(StringUtils::getValueOrDefault(null));
    }

    public function testGetValueOrDefault_Default(){
        $this->assertEquals("default", StringUtils::getValueOrDefault( null, "default" ));
    }
}