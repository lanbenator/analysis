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

class TextFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SelectFilter
     */
    private $tf;

    public function setUp() {
        Template::getTwig(array("../src/templates"));

        $this->tf = new TextFilter(
            "id",
            "name",
            null,
            null,
            "defaultValue"
        );
    }

    public function testPrintValuesWithSelect() {
        $printedValues = $this->tf->printValues();
        $this->assertRegExp("/<input type=\"text\".*>/", $printedValues);
    }

    public function testDefaultValue() {
        $printedValues = $this->tf->printValues();
        $this->assertRegExp("/value=\"defaultValue\"/", $printedValues);
    }

    public function testSelected(){
        $_POST['id'] = "new value";
        $printedFilter = $this->tf->printFilter();
        $this->assertRegExp("/value=\"new value\"/", $printedFilter);
    }
}