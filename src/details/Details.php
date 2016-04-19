<?php

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 2/15/2016
 * Time: 9:33 AM
 */
class Details
{

    /**
     * @var Filter[]
     */
    protected $details;


    public function __construct($xml) {
        foreach ($xml->filter as $filterXml) {
            $id = $filterXml['id'];
            $filter = FilterFactory::createFilter( $filterXml, $filterXml->input_type );
            $this->details[$id] = $filter;
        }
    }

}