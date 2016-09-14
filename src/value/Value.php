<?php

namespace analysis\value;

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/11/2016
 * Time: 4:22 PM
 */
class Value
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $filterDB;

    /**
     * @var string
     */
    protected $tip;

    /**
     * Value constructor.
     * @param string $id
     * @param string $name
     * @param string $filterDB
     * @param string $tip
     */
    public function __construct($id, $name, $filterDB=null, $tip=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->filterDB = $filterDB;
        $this->tip = $tip;
    }

    // ----------------- GETTERS AND SETTERS ----------------
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFilterDB()
    {
        return $this->filterDB;
    }

    /**
     * @param string $filterDB
     */
    public function setFilterDB($filterDB)
    {
        $this->filterDB = $filterDB;
    }

    /**
     * @return string
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @param string $tip
     */
    public function setTip($tip)
    {
        $this->tip = $tip;
    }
}