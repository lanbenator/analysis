<?php

namespace analysis\filter;

require_once "Filter.php";

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/13/2016
 * Time: 9:38 AM
 */
class RadioFilter extends Filter
{
    /**
     * @var Value[]
     */
    protected $values;

    /**
     * RadioFilter constructor.
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


    public function printValues()
    {
//        if (isset($d_id) && $d_id == $v->id) {
//            $res .= " checked='true'";
//        } elseif (isset($v['selected']) && $v['selected'] == "selected") {
//            $res .= " checked='true'";
//        }
        $selected = $this->getValueFromPostOrDefault();

        $template = Template::getTwig()->loadTemplate('radioFilter.tpl');
        return $template->render(
            array(
                'id' => $this->id,
                'values' => $this->values,
                'selected' => $selected
            )
        );
    }

    /**
     * Print a filter based on the given $templateFile which points to a Twig template
     *
     * @param $templateFile : the name of a function which displays the content of this Filter
     * @return mixed
     */
    public function printFilter($templateFile= 'filterInTable.tpl'){
        $template = Template::getTwig()->loadTemplate($templateFile);
        return $template->render(
            array(
                'name' => $this->name,
                'values' => $this->printValues()
            )
        );
    }

    /**
     * Create where statement by the given value which depends on the implementor class.
     * It can be a valueId, or the given value.
     *
     * @param $value
     * @return mixed
     */
    public function createWhere($value)
    {
        return $this->createWhereByValue( $this->findValueById($valueId) );
    }
}