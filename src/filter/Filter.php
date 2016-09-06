<?php

namespace analysis\filter;

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
     * @var string
     */
    protected $styleClass;

    /**
     * @var string
     */
    protected $default;

    /**
     * Filter constructor.
     * @param string $id
     * @param string $name
     * @param string $tip
     * @param string filterDB
     */
    public function __construct($id, $name, $tip=null, $filterDB=null, $default="")
    {
        $this->id = $id;
        $this->name = $name;
        $this->tip = $tip;
        $this->filterDB = $filterDB;
        $this->default = $default;
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

    /**
     * @return string
     */
    public function getStyleClass()
    {
        return $this->styleClass;
    }

    /**
     * @param string $styleClass
     */
    public function setStyleClass($styleClass)
    {
        $this->styleClass = $styleClass;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param string $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * Print a filter based on the given $templateFile which points to a Twig template
     *
     * @param $templateFile: the name of a function which displays the content of this Filter
     * @return mixed
     */
    abstract public function printFilter($templateFile);


    /**
     * Print the values of this filter.
     *
     * @return mixed
     */
    abstract protected function printValues();
}