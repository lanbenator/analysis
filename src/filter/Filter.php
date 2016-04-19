<?php

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/11/2016
 * Time: 3:58 PM
 */
abstract class Filter
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
    protected $tip;

    /**
     * @var string
     */
    protected $filterDB;

    /**
     * Filter constructor.
     * @param string $id
     * @param string $name
     * @param string $tip
     * @param string filterDB
     */
    public function __construct($id, $name, $tip=null, $filterDB=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->tip = $tip;
        $this->filterDB = $filterDB;
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

}