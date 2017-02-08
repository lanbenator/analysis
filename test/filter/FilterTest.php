<?php

//require_once "../src/factory/FilterFactory.php";
use analysis\factory\FilterFactory;

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/11/2016
 * Time: 4:31 PM
 */
class FilterTest extends PHPUnit_Framework_TestCase
{

    private $xml;

    public function __construct(){
        $this->xml = simplexml_load_file( "breast_filters.xml" );
    }

    public function testXml(){
        $filters = $this->xml->xpath( "//filter[@id='er_status']" );
        $this->assertNotNull($filters);
    }

    public function testErStatus(){
        $erStatusFilterXml = $this->xml->xpath( "//filter[@id='er_status']" );

        $erStatusFilter = FilterFactory::createFilter( $erStatusFilterXml[0], $erStatusFilterXml[0]->input_type );
        $this->assertEquals( "er_status", $erStatusFilter->getId() );
    }

    public function testBreastFilters() {
        self::filtersXmlTest( simplexml_load_file("xml/breast_filters.xml") );
    }

    public function testBreastMetabricFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/breast_metabric_filters.xml") );
    }

    public function testBreastMirnaFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/breast_mirna_filters.xml") );
    }

    public function testBreastRnaseqFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/breast_rnaseq_filters.xml") );
    }

    public function testBreastRocFilters() {
        self::filtersRocXmlTest( simplexml_load_file("../xml/breast_roc_filters.xml") );
    }

    public function testColonFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/colon_filters.xml") );
    }
    public function testDlbclFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/dlbcl_filters.xml") );
    }
    public function testGastricFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/gastric_filters.xml") );
    }
    public function testGastricRnaseqFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/gastric_rnaseq_filters.xml") );
    }
    public function testLungFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/lung_filters.xml") );
    }
    public function testOvarFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/ovar_filters.xml") );
    }
    public function testOvarRocFilters() {
        self::filtersRocXmlTest( simplexml_load_file("../xml/ovar_roc_filters.xml") );
    }
    public function testProstateAgilentFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/prostate_agilent_filters.xml") );
    }
    public function testProstateFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/prostate_filters.xml") );
    }
    public function testProstateRnaseqFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/prostate_rnaseq_filters.xml") );
    }
    public function testRccRnaseqFilters() {
        self::filtersXmlTest( simplexml_load_file("../xml/rcc_rnaseq_filters.xml") );
    }

    private function filtersXmlTest($xml) {
        $this->eventFilterTest($xml->event);
        $this->allFilterTest($xml);
    }

    private function filtersRocXmlTest($xml) {
        $this->allFilterTest($xml);
    }

    private function allFilterTest($xml){
        $filterXmls = $xml;
        foreach ($filterXmls->filter as $filterXml) {
            $id = $filterXml['id'];
            echo "Create filter for id: [$id]\n";
            $filter = FilterFactory::createFilter( $filterXml, $filterXml->input_type );
            $this->assertEquals( $id, $filter->getId() );
        }
    }

    private function eventFilterTest($xml) {
        $event = FilterFactory::createFilter( $xml, "event" );
        $this->assertEquals( $xml['id'], $event->getId() );

    }


}