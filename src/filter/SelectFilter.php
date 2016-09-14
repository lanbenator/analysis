<?php

namespace analysis\filter;

use analysis\templates\Template;
use analysis\value\Value;

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
     * @var Value
     */
    protected $emptyValue;

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
     * @param string $filterDB
     * @param string $default
     */
    public function __construct($id, $name, array $values, $tip=null, $filterDB=null, $default="")
    {
        parent::__construct($id, $name, $tip, $filterDB, $default);
        $this->emptyValue = new Value("false", "all", "");
        $this->values = array($this->emptyValue);
        $this->values = array_merge($this->values, $values);
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

    /**
     * $res .= ($f['new'] == "true") ? "<tr class='new'>" : "<tr>";

    $res .= "<td style='" . $f->name['style'] . "' colspan=2>";
    $res .= PrintUtils::printLabel($id, $f, $exprtable, $clintable, "before");
    $res .= "</td>";

    $res .= "<td>";
    $res .= printSelect($f, $id, $exprtable, $clintable);
    $res .= "</td>";

    if (isset($f->tip) && $f->tip != "") {
    $res .= "<td>" . printInfo($f->tip) . "</td>";
    }

    break;
     */
    public function printFilter($templateFile = 'filterInTable.tpl'){
        $template = Template::getTwig()->loadTemplate($templateFile);
        return $template->render(
            array(
                'name' => $this->name,
                'values' => $this->printValues()
            )
        );
    }

//    private function printFilterInTable() {
//        $res = "<tr class='". ($this->new) ? "new" : "" ."'>'";
//
//        $res .= "<td style='". $this->styleClass ."' colspan=2>";
//        // TODO exprtable, clintable
//    //        $res .= PrintUtils::printLabel($this->id, $f, "exprtable", "clintable", "before");
//        $res .= $this->name;
//        $res .= "</td>";
//
//        $res .= "<td>".$this->printValue()."</td>";
//
//        if (isset($this->tip) && $this->tip != "") {
//            $res .= "<td>" . printInfo($this->tip) . "</td>";
//        }
//
//        return $res;
//    }

    public function printValues()
    {
        $selected = $this->getValueFromPostOrDefault();

        $template = Template::getTwig()->loadTemplate('selectFilter.tpl');
        return $template->render(
            array(
                'id' => $this->id,
                'values' => $this->values,
                'selected' => $selected
            )
        );
    }

    /**
     * Finds value by id in the filter
     *
     * @param $valueId
     * @return mixed
     */
    private function findValueById($valueId)
    {
        foreach ($this->values as $value) {
            if ($value->getId() == $valueId) {
                return $value;
            }
        }
        return null;
    }

    /**
     * Creates where statement for the db based on the filterDb of the given value.
     *
     * @param Value $value
     * @return string
     */
    private function createWhereByValue($value){
        $filterDbOfValue = $value->getFilterDB();
        if(is_null($filterDbOfValue)){
            $filterDbOfValue = $this->id ."='".$value->getId()."'";
        }
        return $filterDbOfValue;
    }

    /**
     * Creates where statement for the db based on the id of the value.
     *
     * @param $valueId
     * @return string
     */
    public function createWhere($valueId){
        return $this->createWhereByValue( $this->findValueById($valueId) );
    }
}