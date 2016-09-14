<?php
/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 9/4/2016
 * Time: 10:57 PM
 */

namespace analysis\filter;


use analysis\templates\Template;

class TextFilter extends Filter
{
    /**
     * Print a filter based on the given $templateFile which points to a Twig template
     *
     * @param $templateFile : the name of a function which displays the content of this Filter
     * @return mixed
     */
    public function printFilter($templateFile="filterInTable.tpl")
    {
        $template = Template::getTwig()->loadTemplate($templateFile);
        return $template->render(
            array(
                'name' => $this->name,
                'values' => $this->printValues()
            )
        );
    }

    /**
     * Print the values of this filter.
     *
     * @return mixed
     */
    public function printValues()
    {
        $value = $this->getValueFromPostOrDefault();

        $template = Template::getTwig()->loadTemplate('textFilter.tpl');
        return $template->render(
            array(
                'id' => $this->id,
                'value' => $value
            )
        );
    }

    public function createWhere($value) {
        if($this->isValueValid($value)){
            return $this->id ."='$value'";
        }
        // TODO error handling
        return "";
    }

    private function isValueValid($value){
        return preg_match("/^[a-zA-Z0-9]*$/", $value);
    }
}