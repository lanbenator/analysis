<?php

namespace analysis\factory;
use analysis\utils\StringUtils;
use analysis\value\EventValue;
use analysis\value\Value;

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/15/2016
 * Time: 9:56 AM
 */
class ValueFactory
{

    /**
     * @param $xml
     * @param $type
     * @return EventValue|null|Value
     */
    public static function createValue($xml, $type) {
        $value = null;
        $name = StringUtils::getValueOrDefault( "".$xml->name );
        $filterDb = StringUtils::getValueOrDefault( "".$xml->filterDB );
        $tip = StringUtils::getValueOrDefault( "".$xml->tip );

        switch($type){
            case "event":
                $eventPrefix = StringUtils::getValueOrDefault( "".$xml->eventPrefix );
                $value = new EventValue("".$xml->id, $name, $filterDb, $tip, $eventPrefix);
                break;
            default:
                $value = new Value( "".$xml->id, $name, $filterDb, $tip );
        }
        return $value;
    }
}