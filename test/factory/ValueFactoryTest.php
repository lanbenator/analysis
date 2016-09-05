<?php
use analysis\factory\ValueFactory;

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/19/2016
 * Time: 10:27 AM
 */
class ValueFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testSelectValue()
    {
        $xml = simplexml_load_file( "xml/select_value.xml" );
        $value = ValueFactory::createValue($xml, "event");

        $this->assertEquals($xml->id, $value->getId());
        $this->assertEquals($xml->name, $value->getName());
        $this->assertEquals($xml->filterDB, $value->getFilterDB());
    }

    public function testCheckboxValue()
    {
        $xml = simplexml_load_file( "xml/checkbox_value.xml" );
        $value = ValueFactory::createValue($xml, "value");

        $this->assertEquals("true", $value->getId());
    }

    public function testEventValue()
    {
        $xml = simplexml_load_file( "xml/event_value.xml" );
        $value = ValueFactory::createValue($xml, "event");

        $this->assertEquals($xml->id, $value->getId());
        $this->assertEquals($xml->name, $value->getName());
        $this->assertEquals($xml->filterDB, $value->getFilterDB());
        $this->assertEquals($xml->eventPrefix, $value->getEventPrefix());
    }
}