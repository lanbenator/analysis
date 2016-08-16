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

//    function printSelect($f, $id, $exprtable, $clintable) {
//        $res = "";
//
//        $res .= "<select name='" . $id . "' id='" . $id . "' class='" . $f->style_class . "'>\n";
//        foreach ($f->values->value as $v) {
//            $res .= "<option value='" . $v->id . "'";
//
//            if (isset($d_id) && $d_id == $v->id) {
//                $res .= " selected='selected'";
//            } elseif (isset($v['selected']) && $v['selected'] == "selected") {
//                $res .= " selected='selected'";
//            }
//
//            $res .= ">";
//            //$res .= countDBContent($exprtable, $clintable, $v->filterDB." AND premium=1");
//            $res .= $v->name;
//            if (isset($v->filterDB))
//                $res .= " (n=" . AnalysisUtils::countDBContent($exprtable, $clintable, $v->filterDB . " AND premium=1", "private") . ")";
//            $res .= "</option>";
//        }
//        $res .= "</select>";
//        return $res;
//    }
    public function printFilter()
    {
        $res = "<select id='$this->id' name='$this->name' class='$this->styleClass'>".
            "<option value='false'>all</option>";
            foreach($this->values as $value){
                $res .= "<option value='".$value->getId()."'";
                // TODO if selected
                if(false) {
                    $res .= " selected='selected'";
                }
                $res .= ">";
                $res .= $value->getName()."</option>";
                if( isset( $value->getFilterDB() ) ) {
                    $res .= " (n=" . AnalysisUtils::countDBContent("exprtable", "clintable", $value->getFilterDB() . " AND premium=1", "private") . ")";
                }
                $res .= "</option>";
            }
        $res .= "</select>";
        return $res;
    }
}