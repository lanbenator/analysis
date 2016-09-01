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

class SelectFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SelectFilter
     */
    private $sf;

    public function setUp() {
        Template::getTwig(array("../src/templates"));

        $this->sf = new SelectFilter(
            "id",
            "name",
            array( new Value("vid", "vname", "filterdb") )
        );
    }

    public function testPrintValuesWithSelect() {
        $printedValues = $this->sf->printValues();
        $this->assertRegExp("/<select.*>/", $printedValues);
        $this->assertRegExp("/<\/select>/", $printedValues);
    }

    public function testPrintValuesWithDefaultOption() {
        $printedValues = $this->sf->printValues();
        $this->assertRegExp("/<option value='false'>all<\/option>/", $printedValues);
    }
}