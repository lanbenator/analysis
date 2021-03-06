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
            array(
                new Value("vid", "vname"),
                new Value("vid2", "vname2", "filterdb2")
            ),
            null,
            null,
            "vid2"
        );
    }

    public function testPrintValuesWithSelect() {
        $printedValues = $this->sf->printValues();
        $this->assertRegExp("/<select.*>/", $printedValues);
        $this->assertRegExp("/<\/select>/", $printedValues);
    }

    public function testPrintValuesWithDefaultOption() {
        $printedValues = $this->sf->printValues();
        $this->assertRegExp("/<option value='false'[\s]*>[\s]*all[\s]*<\/option>/", $printedValues);
    }

    public function testPrintFilter(){
        $printedFilter = $this->sf->printFilter();
        $this->assertRegExp("/<tr/", $printedFilter);
        $this->assertRegExp("/<\/tr/", $printedFilter);
    }

    public function testSelected(){
        $_POST['id'] = "vid2";
        $printedFilter = $this->sf->printFilter();
        $this->assertNotRegExp("/<option value='vid'[\s]*selected='selected'[\s]*>/", $printedFilter);
        $this->assertRegExp("/<option value='vid2'[\s]*selected='selected'[\s]*>/", $printedFilter);
    }

    public function testDefaultSelected(){
        $printedFilter = $this->sf->printFilter();
        $this->assertNotRegExp("/<option value='vid'[\s]*selected='selected'[\s]*>/", $printedFilter);
        $this->assertRegExp("/<option value='vid2'[\s]*selected='selected'[\s]*>/", $printedFilter);
    }

    public function testCreateWhere(){
        $this->assertRegExp("/id='vid'/", $this->sf->createWhere("vid"));
    }

    public function testCreateWhereWithGivenFilterDb(){
        $this->assertRegExp("/filterdb2/", $this->sf->createWhere("vid2"));
    }

    public function testCreateWhereWithEmptyValue(){
        $this->assertEquals("", $this->sf->createWhere("false"));
    }
}