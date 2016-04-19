<?php

require_once "Filter.php";

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/12/2016
 * Time: 9:30 AM
 */
class SelectFilter extends Filter
{
    /**
     * @var Value[]
     */
    protected $values;

    /**
     * SelectFilter constructor.
     * @param string $id
     * @param string $name
     * @param Value[] $values
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
     * @return Value[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param Value[] $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }
}