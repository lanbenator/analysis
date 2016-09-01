<?php

namespace analysis\factory;
use analysis\filter\CheckboxFilter;
use analysis\filter\RadioFilter;
use analysis\filter\SelectFilter;

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/12/2016
 * Time: 9:31 AM
 */
class FilterFactory
{

    /**
     * @param $filterXml source of the filter
     * @param $type of the filter
     * @return Filter
     */
    public static function createFilter( $filterXml, $type ) {
        $filter = null;
        switch( $type ){
            case "select":
                $filter = new SelectFilter(
                    "".$filterXml['id'],
                    "".$filterXml->name,
                    static::createValueArray( $filterXml->values ),
                    "".$filterXml->tip,
                    "".$filterXml->filterDB
                );
                break;
            case "event":
                $filter = new SelectFilter(
                    "".$filterXml['id'],
                    "".$filterXml->name,
                    static::createValueArray( $filterXml->values, "event" ),
                    "".$filterXml->tip,
                    "".$filterXml->filterDB
                );
                break;
            case "checkbox":
                $filter = new CheckboxFilter(
                    "".$filterXml['id'],
                    "".$filterXml->name,
                    static::createValue( $filterXml->values ),
                    "".$filterXml->tip,
                    "".$filterXml->filterDB
                );
                break;
            case "radio":
                $filter = new RadioFilter(
                    "".$filterXml['id'],
                    "".$filterXml->name,
                    static::createValueArray( $filterXml->values ),
                    "".$filterXml->tip,
                    "".$filterXml->filterDB
                );
                break;
            default:
                $filter = null;
        }
        return $filter;
    }

    private static function createValueArray( $values, $valueType="" ){
        $valueArray = array();
        foreach( $values->value as $value ){
            $valueArray["".$value->id] = ValueFactory::createValue($value, $valueType);
        }
        return $valueArray;
    }

    private static function createValue( $values ){
        $value = null;
        foreach( $values->value as $valueObj ){
            $value = ValueFactory::createValue($valueObj, "value");
        }
        return $value;
    }
}