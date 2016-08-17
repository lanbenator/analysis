<?php

namespace analysis;

/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 1/13/2016
 * Time: 9:41 AM
 */
class StringUtils
{

    public static function getValueOrDefault( $value, $default=null ){
        return (isset($value)) ? $value : $default;
    }
}