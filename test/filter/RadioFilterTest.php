<?php
/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 8/18/2016
 * Time: 4:25 PM
 */

namespace analysis\filter;

use analysis\templates\Template;
use analysis\value\Value;
use PHPUnit_Framework_TestCase;

class RadioFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RadioFilter
     */
    private $rf;

    public function setUp() {
        Template::getTwig(array("../src/templates"));

        $this->sf = new RadioFilter(
            "id",
            "name",
            array(
                new Value("vid", "vname"),
                new Value("vid2", "vname2", "filterdb2")
            ),
            null,
            null,
            "vid2"
        );
    }

    public function testPrintValuesWithRadio() {
        $printedValues = $this->sf->printValues();
        echo $printedValues;
    }

}