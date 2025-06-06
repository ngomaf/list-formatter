<?php

namespace Ngomafortuna\ListFormatter;

use stdClass;


class ListTemplate
{
    public static function objectValidate(object|array $list): object
    {
        if(is_array($list)) {
            $newList = new stdClass;
            
            foreach($list as $key => $value) {
                $newList->$key = (object)$value;
            }

            $list = $newList;
        }

        return $list;
    }
}
