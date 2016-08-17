<?php

namespace analysis\filter;

require_once "Filter.php";

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/15/2016
 * Time: 9:43 AM
 */
class EventFilter extends Filter
{
    /**
     * @var EventValue[]
     */
    private $values;

    /**
     * SelectFilter constructor.
     * @param string $id
     * @param string $name
     * @param EventValue[] $values
     * @param string $tip
     * @param string filterDB
     */
    public function __construct($id, $name, array $values, $tip=null, $filterDB=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->tip = $tip;
        $this->values = $values;
        $this->filterDB = $filterDB;
    }


    /**
     * @return EventValue[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param EventValue[] $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

}