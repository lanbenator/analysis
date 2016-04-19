<?php

require_once "Value.php";

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/15/2016
 * Time: 9:44 AM
 */
class EventValue extends Value
{
    /**
     * @var string
     */
    private $eventPrefix;

    /**
     * Value constructor.
     * @param string $id
     * @param string $name
     * @param string $filterDB
     * @param string $tip
     * @param string $eventPrefix
     */
    public function __construct($id, $name, $filterDB=null, $tip=null, $eventPrefix=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->filterDB = $filterDB;
        $this->tip = $tip;
        $this->eventPrefix = $eventPrefix;
    }

    /**
     * @return string
     */
    public function getEventPrefix()
    {
        return $this->eventPrefix;
    }

    /**
     * @param string $eventPrefix
     */
    public function setEventPrefix($eventPrefix)
    {
        $this->eventPrefix = $eventPrefix;
    }


}