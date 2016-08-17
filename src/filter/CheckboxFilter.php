<?php

namespace analysis\filter;

require_once "Filter.php";

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/12/2016
 * Time: 10:14 AM
 */
class CheckboxFilter extends Filter
{
    /**
     * @var Value
     */
    private $value;

    /**
     * SelectFilter constructor.
     * @param string $id
     * @param string $name
     * @param Value $value
     * @param string $tip
     * @param string filterDB
     */
    public function __construct($id, $name, $value, $tip=null, $filterDB=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->tip = $tip;
        $this->value = $value;
        $this->filterDB = $filterDB;
    }

    /**
     * @return Value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param Value $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


}